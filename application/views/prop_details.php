<?php foreach($prop_details as $p){} ?>
<div class="carousel_in">
    <?php foreach($images as $i){ ?>
      <div><img src="<?php echo base_url() ?>/media/<?php echo $i->path;  ?>" alt="image">
	  <!--<div class="caption"><h3>Fantastic bed room</h3></div>-->
	  </div>
    <?php } ?>
	</div>
    
    
    <h1 class="main_title_in"><?php echo $p->prop_title ?></h1>
    <div class="container add_bottom_60">
        
        <div class="row">
        	<div class="col-md-8" id="room_detail_desc">
            <div id="single_room_feat">
                <ul>
                	<li><i class="icon_set_1_icon-7"></i>Wifi</li>
                    <li><i class="icon_set_2_icon-116"></i>Plasma TV</li>
                    <li><i class="icon_set_2_icon-104"></i>King size bed</li>
                    <li><i class="icon_set_2_icon-111"></i>Bathtub</li>
                    <li><i class="icon_set_2_icon-106"></i>Safe box</li>
                </ul>
            </div>
           
         <div class="row">
                <div class="col-md-3">
                    <h3>Description</h3>
                </div>
                <div class="col-md-9">
                    <p>
                      <?php echo $p->prop_description; ?>                       
					   </p>
                    <h4>Room facilities</h4>
                    <p>
                        Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
                    </p>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                    	 <ul class="list_ok">
                                <li>Coffee machine</li>
                                <li>Wifi</li>
                                <li>	Microwave</li>
                                <li>Oven</li>
                            </ul>
                    </div>
                    <div class="col-md-4 col-sm-4">
                    	 <ul class="list_ok">
                                <li>Fridge</li>
                                <li>Hairdryer</li>
                                <li>Towels</li>
                                <li>Toiletries</li>
                            </ul>
                    </div>
                    <div class="col-md-4 col-sm-4">
                    	 <ul class="list_ok">
                                <li>DVD player</li>
                                <li>Air-conditioning</li>
                                <li>Tv</li>
                                <li>Freezer</li>
                            </ul>
                    </div>
                    </div><!-- End row  -->
                    <h4>Price</h4>
                     <!-- start pricing table -->
                        <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Per Night)</td>
                            <td>&#8358; <?php echo number_format($p->prop_price) ?></td>
                        </tr>
                       
                        </tbody>
                        </table>
                </div><!-- End col-md-9  -->
            </div><!-- End row  -->

          	<hr>
            
            <div class="row">
                <div class="col-md-3">
                    <h3>Reviews</h3>
                    <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Leave a review</a>
                </div>
                <div class="col-md-9">
                	<?php foreach ($reviews as $r){ ?>
                    <div class="review_strip_single">
                        <img src="<?php echo base_url() ?>assets/img/avatar1.jpg" alt="" class="img-circle">
                        <small> - <?php echo date("d M, Y", strtotime($r->timestamp)); ?> -</small>
                        <h4><?php echo $r->name; ?></h4>
                        <p>
                            <?php echo $r->comment; ?>
							</p>
                       
                    </div><!-- End review strip -->
					<?php } ?>
                </div>
            </div>  
			
			
	 <div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
	         <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myReviewLabel" style="font-weight:500;">Write your review</h4>
			</div>
			<div class="modal-body">
				<div id="message-review">
				</div>
				<form method="post" action="" name="review" id="review">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input name="name_" id="name" type="text" placeholder="Your name" class="form-control" required>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input name="email" id="email" type="text" placeholder="Your email" class="form-control" required>
							</div>
						</div>
						
					</div>
					
					<div class="form-group">
						<textarea name="review_text" id="comment" class="form-control" style="height:100px" placeholder="Write your review" required></textarea>
					</div>
					
					
					<button  class="btn_1" id="button">Submit</submit>
					<span id="error"></span>
				</form>
			</div>
		</div>
	</div>
</div><!-- End Modal Review -->

			
	<script type="text/javascript" >
 
$('#button').click(function() {

  /* if( $("#name").val() == "")
        {
            alert("Name is required");
        }
        else if($("#email").val() == "")
        {
            alert("Email is required");           
        }
		 else if($("#comment").val() == "")
        {
            alert("Comment is required");          
        } 
        else{
	*/

    var form_data = {
        name: $('#name').val(),	 
		email: $('#email').val(),
		comment: $('#comment').val(),
		type: 'experience',
		source_id: '<?php echo $p->prop_id; ?>'
	 
    };
    //var data = $("#sreg-form").serialize();
    $.ajax({
        url: "<?php echo site_url('properties/place_review'); ?>",
        type: 'POST',
        data: form_data,
    beforeSend: function()
      { 
        //$("#error").fadeOut();
        $("#button").html(' &nbsp; Please wait...');
      },
        success :  function(response)
         {            
          if(response=="success"){
            
         
             $("#error").html('<div class="alert alert-info">  &nbsp; Your review has been received. Thanks! </div>');
            $("#button").html(' &nbsp; Done!');
           
          }
          else{
                  
            $("#error").fadeIn(3000, function(){            
                $("#error").html('<div class="alert alert-info">  &nbsp; '+response+' </div>');
                      $("#button").html('&nbsp;Retry...');
                                         });
          }
        }
		
    });
    return false;
        
});


 
 
 
 </script>
  
  		
			
			
            <hr>
            <div class="row">
            <div class="col-md-3">
                    <h3>Policies</h3>
                </div>
                <div class="col-md-9">
                <ul id="policies">
                    <li><i class="icon_set_1_icon-83"></i><h5>Check-in and check-out.</h5>
                    <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel lorem legendos. Unum etiam cum te, an elit assueverit vix, falli aliquam complectitur ex ius.</p>
                    </li>
                    <li><i class="icon_set_1_icon-54"></i><h5>Cancellation</h5>
                    <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel lorem legendos. Unum etiam cum te, an elit assueverit vix, falli aliquam complectitur ex ius.</p>
                    </li>
                    <li><i class="icon_set_1_icon-47"></i><h5>Smoking</h5>
                    <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel lorem legendos. Unum etiam cum te, an elit assueverit vix, falli aliquam complectitur ex ius.</p>
                    </li>
                    <li><i class="icon_set_1_icon-35"></i><h5>Payments</h5>
                    <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel lorem legendos. Unum etiam cum te, an elit assueverit vix, falli aliquam complectitur ex ius.</p>
                    </li>
                    <li><i class="icon_set_1_icon-13"></i><h5>Disable</h5>
                    <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel lorem legendos. Unum etiam cum te, an elit assueverit vix, falli aliquam complectitur ex ius.</p>
                    </li>                    
                    </ul>
                </div>
                </div>
            </div><!-- End col -->
            
              <div class="col-md-4" id="sidebar">
            <div class="theiaStickySidebar">
            	<div class="box_style_1">
                    <div id="message-booking"></div>
                    <form method="post" action="" id="check_avail" autocomplete="off" >
                    <input name="room_type" id="room_type" type="hidden" value="Double room">	
                    	<div class="row">
                        	<div class="col-md-6 col-sm-6">
                            	<div class="form-group">
                                	<label>Check-In</label>
                            	   	<input class="startDate1 form-control datepick" required type="text" data-field="date" data-startend="start" data-startendelem=".endDate1" readonly placeholder="Check-In" id="in_date" name="in_date">
                                   <span class="input-icon"><i class="icon-calendar-7"></i></span>
                                   </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<div class="form-group">
                                	<label>Check-Out</label>
                            	   <input class="endDate1 form-control datepick" required type="text" data-field="date" data-startend="end" data-startendelem=".startDate1" readonly placeholder="Check-Out" id="out_date" name="in_date">
                                   <span class="input-icon"><i class="icon-calendar-7"></i></span>
                               </div>
                            </div>
                        </div><!-- End row -->
                       
           				<div class="row">
                        	
                             
                                   <div class="col-md-12 col-sm-6">
                                   <div class="form-group">
                                	<label>Email</label>
                            	 		<input type="text" class="form-control" required name="email_booking" id="book_email" placeholder="Your email">
                                   </div>
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                   <div class="form-group">
                                  
								    <button id="button2" class="btn_full">Book now</button>
                                   </div>
                                   </div>
                             </div>
                        </form>
						<span id="error2"><span>
                        <hr>
                        <a href="#0" class="btn_outline"> or Contact us</a>
                        <a href="tel://09099991475" id="phone_2"><i class="icon_set_1_icon-91"></i>09099991475</a>
                       <script type="text/javascript" >
 
$('#button2').click(function() {

    var form_data = {
        in_date: $('#in_date').val(),	 
		out_date: $('#out_date').val(),
		book_email: $('#book_email').val(),
		bsource_id: '<?php echo $p->prop_id; ?>',
        name: '<?php echo $p->prop_title; ?>',
        price: '<?php echo $p->prop_price; ?>'
	 
    };
    //var data = $("#sreg-form").serialize();
    $.ajax({
        url: "<?php echo site_url(); ?>/properties/book",
        type: 'POST',
        data: form_data,
    beforeSend: function()
      { 
        //$("#error").fadeOut();
        $("#button2").html(' &nbsp; Please wait...');
      },
        success :  function(response)
         {            
          if(response=="success"){
            
         
             $("#error2").html('<div class="alert alert-info"> Your booking was successful! We will contact you soon. </div>');
            $("#button2").html(' &nbsp; Done!');
           
          }
          else{
                  
            $("#error2").fadeIn(3000, function(){            
                $("#error2").html('<div class="alert alert-info">  &nbsp; '+response+' </div>');
                      $("#button2").html('&nbsp;Retry...');
                                         });
          }
        }
		
    });
    return false;
        
});

 </script>
  
  
                </div><!-- End box_style -->
            </div><!-- End theiaStickySidebar -->
            </div><!-- End col -->
            
        </div><!-- End row -->
                
            </div><!-- End container -->
			<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
			<script>
  $('.carousel_in').owlCarousel({
    center: true,
    items:1,
    loop:true,
	 autoplay:true,
	 navText: [ '', '' ],
	addClassActive: true,
    margin:5,
    responsive:{
        600:{
            items:1
        },
		 1000:{
            items:2,
			nav:true,
        }
    }
});
</script>
			<script src="<?php echo base_url() ?>assets/js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
      additionalMarginTop: 80
    });
</script>
    

    