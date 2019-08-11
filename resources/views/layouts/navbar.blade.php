      <style type="text/css">
    *{
    margin: 0;
    padding: 0;
}
main{
    margin-top: -17px;
    padding: 0px, 100px 0px 100px;
    background: #ffffff;
}
header{
    box-shadow: inset 0 0 0 1000px rgba(0,0,0,.2);
}
.navba{
    border-top: 1px #ffffff solid;
}
.main-nav{
    float: none;
    list-style: none;
    margin-top: 0px;
    padding-top: 10px;
    background:#f66733;
    width: 100%;
    height: 50px;
    text-align: center;
}
.main-nav li {
    display: inline-block;
}

.main-nav li a {
    color: #000000;
    text-decoration: none;
    padding: 5px 20px;
    font-family: roboto;
    font-size: 20px;
}
.main-nav li.active a{
    border: 1px solid white;
}
.main-nav li a:hover{
    border: 1px solid white;
}
.logo img{
    width: 60px;
    height: auto;
    margin-top:10px;
    margin-left: 30px;
    float: left;
}
body{
    font-family: monospace;
}
   
    .welcomeMsg{
        background: #dfe3ee;
      padding: 0px 0px 0px 0px;
        width: 100%;
        align-self: center;
    }

.msg{
padding-left: 20px;
}
.msg p{
    margin-top: 30px;
    font-size: 30px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

    .students {
        box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.6);
        color: #ffffff;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 26px;
        height: 550px;
       width: 100%;
    
    }
    
    .students h1{
        padding: 5px 300px 5px 350px;
        font-size: 44px;
        font-family: roboto;
        text-align: center;
        text-transform: uppercase;
            }
            .students p{
                padding: 40px 300px 10px 350px;
                font-size: 20px;
                font-family: 'Muli', sans-serif;
                text-align: center;
            }
    .startBtn{
        margin-top: 10px;
      margin: 50px 100px 100px 550px;
        border: 1px solid #f66733;
        height: 50px;
        font-size: 24px;
        background-color: #f66733;
        color: #000000;
        font-family: 'Times New Roman', Times, serif;
        padding: 5px;
    }
    .startBtn:hover{
        background-color: #ffffff;
        color: #000000;
    }
    .news{
        background:  #ffffff;
        padding: 0px 100px 0px 100px;
        width: 100%;
        align-self: center;
    }
    .news1, .news2, .news3{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
        margin: 20px;
        font-family: roboto;
        font-size: 18px;
    }
    .newsHeading{
        padding: 10px 20px 10px 20px;
    }
    .card-body p{
        padding: 10px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
    }
 
    /* @media only screen and (max-width: 560px) { */
        @media only screen and (max-width: 750px) {  
        main{
            padding: 0px, 0px 0px 0px;
            background: #ffffff;
        }
        .welcomeMsg{
            background: #dfe3ee;
          padding: 0px 0px 0px 0px;
            width: 100%;
            align-self: center;
        }
        .navba{
            border-top: 1px #ffffff solid;
    }
    .main-nav li a {
        color: #000000;
        text-decoration: none;
        padding: 5px 15px;
        font-family: roboto;
        font-size: 16px;
    }
    .msg{
        padding-left: 20px;
        }
    .msg p{
        font-size: 14px;
    }
    .students {
        box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.6);
        color: #ffffff;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 16px;
        height: 300px;
        margin-right: 0px;
        width: 100%;
    }
 
    .startBtn{
        margin-top: 3px;
      padding: 3px;
      margin: 20px 100px 100px 60px;
        border: 1px solid #f66733;
        height: 40px;
        font-size: 20px;
        background-color: #f66733;
        color: #000000;
        font-family: 'Times New Roman', Times, serif;
    }

     .news{
        background:  #dfe3ee;
        padding: 0px 0px 0px 0px;
        width: 100%;
        align-self: center;
    }

    .news1, .news2, .news3{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
        font-family: roboto;
        font-size: 18px;
    }
    .newsHeading{
        padding: 10px 20px 10px 20px;
    }

    .students h1{
        padding: 5px 30px 5px 50px;
        font-size: 20px;
        font-family: roboto;
        text-transform: uppercase;
            }
            .students p{
                padding: 10px 30px 10px 30px;
                font-size: 16px;
                text-align: center;
                font-family: 'Muli', sans-serif;
            }
            contactPhoneEmail{
                color: white; 
                padding-top:30px; 
                line-height: 28px;
            }
}
</style>
    <body>

      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">
@if(isset($fetchSettings))
     <img class="card-img-top" src="/upload/{{$fetchSettings->schoolName == '' ? 'logo.png': $fetchSettings->schoolLogo}}" id="studentProfileImage" style="width: 50px; height: 50px;">     {{$fetchSettings->schoolName}}
@endif
  </h5>
  <nav class="my-2 my-md-0 mr-md-3">

    <a class="p-2 text-dark" href="/">Home</a>
    <a class="p-2 text-dark" href="#">About</a>
    <a class="p-2 text-dark" href="#">Events</a>
    <a class="p-2 text-dark" href="/products">Shop Now</a>
  </nav>
  <a class="btn btn-outline-primary"  href="{{ route('login') }}">Login</a>
</div>