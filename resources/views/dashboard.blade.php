<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/dash-css.css') }}">
</head>
<body>
    
    
    <input type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Accusoft</span> 
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                    <span>Dasboard</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users"></span>
                    <span>Customers</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Projects</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                    <span>Orders</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-receipt"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-user-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    
                    Dashboard
                </h2>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="search here" />
                </div>

                <div class="user-wrapper">
                    <img src="{{ asset('img/Murat.jpeg') }}" width="40px" height="40px" alt="">
                    <div>
                        <h4>Murat Boz</h4>
                        <small>Administrator</small>
                    </div>
                </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-user"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>  

                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>$5k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="las la-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Projects</h3>
                            <button>See all <span class="las la-arrow-right">
                            </span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Project Title</td>
                                                <td>Departement</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ui/Ux Design</td>
                                                <td>UI Team</td>
                                                <td>
                                                    <span class="status purple"></span>
                                                    Review
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Web development</td>
                                                <td>Frontend</td>
                                                <td>
                                                    <span class="status pink"></span>
                                                    In Progress
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ushop app</td>
                                                <td>Mobile Team</td>
                                                <td>
                                                    <span class="status orange"></span>
                                                    Pending
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ui/Ux Design</td>
                                                <td>UI Team</td>
                                                <td>
                                                    <span class="status purple"></span>
                                                    Review
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Web development</td>
                                                <td>Frontend</td>
                                                <td>
                                                    <span class="status pink"></span>
                                                    In Progress
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ushop app</td>
                                                <td>Mobile Team</td>
                                                <td>
                                                    <span class="status orange"></span>
                                                    Pending
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>                                 
                            </div>
                        </div>
                    </div>
                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h3>New Customer</h3>
                                <button>See all <span class="las la-arrow-right">
                                </span></button>
                            </div>
                            <div class="card-body">
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                        height="40px" alt="">
                                        <div>
                                            <h4>Ian Somerhalder</h4>
                                            <small>CEO Expert</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                        height="40px" alt="">
                                        <div>
                                            <h4>Ian Somerhalder</h4>
                                            <small>CEO Expert</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                        height="40px" alt="">
                                        <div>
                                            <h4>Ian Somerhalder</h4>
                                            <small>CEO Expert</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                        height="40px" alt="">
                                        <div>
                                            <h4>Ian Somerhalder</h4>
                                            <small>CEO Expert</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                        height="40px" alt="">
                                        <div>
                                            <h4>Ian Somerhalder</h4>
                                            <small>CEO Expert</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>

    </main>
</div>

</body>
</html>