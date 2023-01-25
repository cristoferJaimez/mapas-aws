<div class="mt-2">
    <nav>
            <ul class="mcd-menu">
                
               
                <li>
                    <a href="javascript:;"  onclick="print()">
                        <i class="fa-solid fa-print btn btn-sm btn-secondary" ></i>
                    </a>
                </li>
             
                <li>
                    <form action="{{ url('logout') }}" style="display: inline;" id="logout" method="POST">
                        
                        <a href="javascript:;" onclick="document.getElementById('logout').submit();">
                            @csrf
                          
                                <i class="fa-solid fa-arrow-right-from-bracket btn btn-sm btn-danger"></i>
                            </a>
                     
                    </form>
               
                </li>
            
            </ul>
        </nav>
    </div>

    