@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
	<div id="page-inside4" class="insd ">
    <div class="top-bg"></div>
    	
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
         
   	  <div class="team-bg"></div>
          
		
    </div>
    <div class="contents">
      <div class="tm-tp-br">
    	<div class="container-fluid">
            <div class="col-sm-12 col-md-12 no-pd "> 
            	
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<ul class="cl-map">
                    	<li class="gry"><i class="fa fa-circle"></i> Not Qualified</li>
                        <li class="blck"><i class="fa fa-circle"></i> Qualified</li>
                        <li class="blu"><i class="fa fa-circle"></i> Active</li>
                    
                    </ul>
                </div>
                <div class="col-md-3 col-sm-5 col-xs-12 pull-right">
                 <div id="srch">
                	<div class="search-bar">
                     <form  class="icon">
                        
                        <input type="text" placeholder="Search for user by ID">
                        <input type="submit" value="Search">
                     </form>
        
       			   </div>
        		 </div>
                </div>
   

    
   			</div>
        </div>
      </div>
      <div class="orgchrt">
      	<div class="container">
            <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
             <div class="col-md-5 col-xs-12 col-sm-6 text-center no-pd">
               <h3>Total Left = <span>210 IR’s</span></h3>
               <h3>Qualified  = <span>210 IR’s</span></h3>
             </div>
             
             <div class="col-md-5 col-xs-12 col-sm-6 text-center no-pd">
               <h3>Total Right = <span>210 IR’s</span></h3>
               <h3>Qualified  = <span>210 IR’s</span></h3>
             </div>
             
            </div>
        	<div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
             
             <div class="col-md-6 col-xs-12 col-sm-12 no-pd col-md-offset-2">
              <div class="tm-mbr">
               <i class="fa fa-4x fa-user"></i>
               </div>
               <div class="mbr-box1">
                <div class="tm-mbr1">
                <h4>
 				 <a  data-toggle="collapse" href="{{asset("assets/")}}/#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Ali
                 <i class="fa fa-chevron-down"></i>
                 </a>
				</h4>
				 <div class="collapse" id="collapseExample1">
                  <div class="mbr-sub1">
                  <h4>Ahmed</h4>
				 </div>
                  <div class="mbr-sub2">
                  <h4><a href="{{asset("assets/")}}/#squarespaceModal-7" data-toggle="modal" ><i class="fa fa-plus"></i></a></h4>
				 </div>
				</div>
                </div>
                
                </div>
                <div class="mbr-box2">
                 <div class="qulifd">
                  <h4>Ahmed</h4>
				 </div>
                </div>
             </div>
             
             
            </div>
        </div>
      </div>  
    
    </div>

@endsection
<div class="modal fade" id="squarespaceModal-7" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal mdl">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <div class="wrapper">


                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <form class="register_form" method="POST" action="{{ url('addDownLine') }}">
                                @csrf

                                <div class="form-group col-sm-12 lft">
                                    <div class="form-control" style="height: 35px;">
                                        <div class="pull-left">
                                            <label for="position">Left</label>
                                            <input checked required value="1" name="position"
                                                   type="radio">

                                        </div>
                                        <div class="pull-right">
                                            <label for="position">Right</label>
                                            <input required value="2" id="position" name="position"
                                                   type="radio">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-4  lft">

                                    <input required id="name" value="{{ old('name') }}" name="name"
                                           type="text"
                                           class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-4 rght1">

                                    <input required id="middle_name" value="{{ old('mid_name') }}"
                                           name="middle_name"
                                           type="text"
                                           class="form-control" placeholder="Middle Name">
                                </div>
                                <div class="form-group col-md-4  rght">

                                    <input required id="last_name" value="{{ old('last_name') }}"
                                           name="last_name"
                                           type="text"
                                           class="form-control" placeholder="Last Name">
                                </div>

                                <div class="form-group col-md-4  lft">

                                    <select required id="country" class="form-control selecty"
                                            name="country">
                                        <option value="0" disabled selected>Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4 rght1">

                                    <select required id="state" class="form-control selecty"
                                            name="state_id">

                                        <option value="0" disabled selected>State</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4  rght">

                                    <input required id="city" name="city" type="text" class="form-control"
                                           placeholder="city">
                                </div>

                                <div class="form-group nw-pd">

                                    <input required id="address" name="address" type="text"
                                           class="form-control"
                                           placeholder="Address">
                                </div>

                                <div class="form-group col-md-6  lft">

                                    <input required id="national_id" name="national_id" type="text"
                                           class="form-control"
                                           placeholder="National ID">
                                </div>
                                <div class="form-group col-md-6 rght">

                                    <input required style="line-height: 1" name="birth_date" type="date"
                                           class="form-control"
                                           id="datepicker"
                                           placeholder="Date of birth">
                                </div>

                                <div class="form-group col-md-6  lft">

                                    <input required id="phone" name="phone" type="text" class="form-control"
                                           placeholder="Phone">
                                </div>
                                <div class="form-group col-md-6 rght">

                                    <input required id="email" name="email" type="email"
                                           class="form-control"
                                           placeholder="E-mail">
                                </div>

                                <div class="form-group col-md-6  lft">

                                    <input required id="user_name" name="user_name" type="text"
                                           class="form-control"
                                           placeholder="Username">
                                </div>
                                <div class="form-group col-md-6 rght">

                                    <input required id="beneficiary" name="beneficiary" type="text"
                                           class="form-control"
                                           placeholder="Beneficiary">
                                </div>

                                <div class="form-group col-md-6  lft">

                                    <input required id="password" name="password" type="password"
                                           class="form-control"
                                           placeholder="Password">
                                </div>
                                <div class="form-group col-md-6 rght">

                                    <input required id="password_confirmation" name="password_confirmation"
                                           type="password" class="form-control"
                                           placeholder="Re-Password">
                                </div>

                                <div class="form-group col-md-6  lft">

                                    <input required id="inside_password" name="inside_password"
                                           type="password" class="form-control"
                                           placeholder="Inside Password">
                                </div>
                                <div class="form-group col-md-6 rght">

                                    <input required id="inside_password_confirmation"
                                           name="inside_password_confirmation" type="password"
                                           class="form-control"
                                           placeholder="Re-Inside Password">
                                </div>
                                <div class="clearfix"></div>
                                <div class="checkbox">
                                    <label class="chk">
                                        <input id="terms" type="checkbox"> I accept the <a href="#"
                                                                                           target="_self">Terms
                                            of Use.</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn nwbtn4">Sign up</button>
                            </form>

                        </div>


                    </section>
                </div>


            </div>
        </div>
    </div>
</div>
