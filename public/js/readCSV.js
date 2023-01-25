let input = document.getElementsByClassName('file_users')

$(document).on("change", input, function(e) {
    function parseCSV(text) {
        // Obtenemos las lineas del texto
        let lines = text.replace(/\r/g, '').split('\n');
        return lines.map(line => {
            // Por cada linea obtenemos los valores
            let values = line.split(',');
            return values;
        });
    }

    function reverseMatrix(matrix) {
        let output = [];
        // Por cada fila
        matrix.forEach((values, row) => {
            // Vemos los valores y su posicion
            values.forEach((value, col) => {
                // Si la posición aún no fue creada
                if (output[col] === undefined) output[col] = [];
                output[col][row] = value;
                console.log();
            });
        });
        return output;
    }

    function readFile(evt) {
        let file = evt.target.files[0];
        let reader = new FileReader();
        reader.onload = (e) => {
            // Cuando el archivo se terminó de cargar
            let lines = parseCSV(e.target.result);
            let output = reverseMatrix(lines);
            let ta = crearTabla(output)

        };
        // Leemos el contenido del archivo seleccionado
        reader.readAsBinaryString(file);
    }

    function crearTabla(datosTabla) {
        let table = document.createElement('table');
        let thead = document.createElement('thead');
        let tbody = document.createElement('tbody');

        table.appendChild(thead);
        table.appendChild(tbody);

        // Creating and adding data to second row of the table

        datosTabla.forEach((element, i) => {
            for (let a = 0; a <= element.length; a++) {
                if (typeof element[a] === 'string') {
                    let arr_ = element[a].split(";");
                    let row_2 = "fila" + a;
                    row_2 = document.createElement('tr');
                    for (let j = 0; j <= arr_.length; j++) {
                        let row_2_data_1 = j;
                        if (a === 0) {
                            row_2_data_1 = document.createElement('th');
                        } else if (arr_[j] !== undefined) {
                            row_2_data_1 = document.createElement('td');
                            row_2_data_1.innerHTML = arr_[j];
                            row_2.appendChild(row_2_data_1);
                        } else {
                            row_2_data_1 = document.createElement('td');
                            row_2_data_1.innerHTML = "id: " + a;
                            row_2.appendChild(row_2_data_1);
                        }
                    }

                    $(tbody.appendChild(row_2)).show('1500');
                }

            }

        });


        // Adding the entire table to the body tag
        table.setAttribute("style", "font-size:0.9em");
        $(table).addClass('table table-striped')
        document.getElementById('contenido_csv').appendChild(table);

        const button = document.createElement('button');
        button.type = 'button';
        button.innerText = 'clear table';
        $(button).addClass('btn btn-sm btn-outline-danger')
        $(button).on('click', function(params) {
            $(button).hide('1000')
            let input = document.getElementsByClassName('file_csv')
            $(input).val('')
            clear_table();
        })
        document.getElementById('btn_clear').appendChild(button);
    }

    readFile(e)


    function clear_table() {
        let clear = document.getElementById('contenido_csv').innerHTML = "";
        $(clear).show('1000');
    }
});