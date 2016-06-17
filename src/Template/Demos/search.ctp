<?php $this->Html->scriptStart(['block' => true]); ?>    

 $(function () {
        var page = 1;
        var resultsPerPage = 10;
        var data = [];
        $.addTemplateFormatter({
            currency: function (value, template) {
                switch (template) {
                    case "en":
                        return "&pound;" + value;
                    default:
                        return value;
                }
            },
            tags: function (value, template) {
                return value.join(", ");
            },
            coordinates: function (value) {
                return value.latitude + ", " + value.longitude;
            },
            productLink: function (value) {
                return "Products/" + value;
            }
        });

        $("#PerformSearch").click(function () {
            $.get("/fr/demos/searchData", function (response) {
                data = response
                displayPage(1);
            }, "json");
        });
        
        $("#PerformSearchText").click(function () {
            $.get("/fr/demos/searchDataTxt", function (response) {
                data = response
                displayPage(1);
            }, "json");
        });
        
        // bind the submit event
		$('#SearchForm').submit(function(event) {
		event.preventDefault(); // Prevent the form from submitting via the browser
		   var queryString = new FormData($('#SearchForm')[0]);
		    $.ajax({
		        type: "POST",
		        url: '/fr/demos/searchData',
		        data: queryString,
		        contentType: false,
		        processData: false,
		        beforeSend: function() {
		        	
		        },
		        success: function(response) {
		        	var data = response;
		        	var pageNo = 1;
		        	$("#ResultsDisplay tbody").loadTemplate("/js/Templates/SearchResult.html", data, {paged: true, pageNo: pageNo, elemPerPage: resultsPerPage, success: function() {console.log('success');}, complete: function(){console.log('complete')}, error: function(){console.log('error');}});
		            page = pageNo;
		            if (page * resultsPerPage > data.length) {
		                $("[data-action='next']").attr('disabled', 'disabled');
		            } else {
		                $("[data-action='next']").removeAttr('disabled');
		            }
		            if (page <= 1) {
		                $("[data-action='prev']").attr('disabled', 'disabled');
		            } else {
		                $("[data-action='prev']").removeAttr('disabled');
		            }
		            $("#ResultsDisplay").show();
		            $("#ResultsPaging").show();
		        }
		    });
		});
		
		
		$('#SearchFullText').submit(function(event) {
		event.preventDefault(); // Prevent the form from submitting via the browser
		   var queryString = new FormData($('#SearchFullText')[0]);
		    $.ajax({
		        type: "POST",
		        url: '/fr/demos/searchDataTxt',
		        data: queryString,
		        contentType: false,
		        processData: false,
		        beforeSend: function() {
		        	
		        },
		        success: function(response) {
		        	var data = response;
		        	var pageNo = 1;
		        	$("#ResultsDisplay tbody").loadTemplate("/js/Templates/SearchResult.html", data, {paged: true, pageNo: pageNo, elemPerPage: resultsPerPage, success: function() {console.log('success');}, complete: function(){console.log('complete')}, error: function(){console.log('error');}});
		            page = pageNo;
		            if (page * resultsPerPage > data.length) {
		                $("[data-action='next']").attr('disabled', 'disabled');
		            } else {
		                $("[data-action='next']").removeAttr('disabled');
		            }
		            if (page <= 1) {
		                $("[data-action='prev']").attr('disabled', 'disabled');
		            } else {
		                $("[data-action='prev']").removeAttr('disabled');
		            }
		            $("#ResultsDisplay").show();
		            $("#ResultsPaging").show();
		        }
		    });
		});
		
		
        $("#SearchForm").change(function() {
        	
		    $("#SearchForm").submit();
		});
        
        


        $("[data-action='next']").click(function () {
            displayPage(page + 1);
        });

        $("[data-action='prev']").click(function () {
            displayPage(page - 1);
        });

        function displayPage(pageNo) {
            $("#ResultsDisplay tbody").loadTemplate("/js/Templates/SearchResult.html", data, {paged: true, pageNo: pageNo, elemPerPage: resultsPerPage, success: function() {console.log('success');}, complete: function(){console.log('complete')}, error: function(){console.log('error');}});
            page = pageNo;
            if (page * resultsPerPage > data.length) {
                $("[data-action='next']").attr('disabled', 'disabled');
            } else {
                $("[data-action='next']").removeAttr('disabled');
            }
            if (page <= 1) {
                $("[data-action='prev']").attr('disabled', 'disabled');
            } else {
                $("[data-action='prev']").removeAttr('disabled');
            }
            $("#ResultsDisplay").show();
            $("#ResultsPaging").show();
        }
    });

        
<?php $this->Html->scriptEnd(); ?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
 <?php $cell = $this->cell('Criteria'); 
      echo $cell ?>
</nav>

<div class="Demos index large-9 medium-8 columns content">
	<h3><?= __('Search') ?></h3>
	<table id="ResultsDisplay" class="pure-table pure-table-striped">
	    <thead>
	        <tr>
	            <th>id</th>
	            <th><?php echo __('title'); ?></th>
	            <th>price</th>
	            <th>tags</th>
	            <th>coordinates</th>
	        </tr>
	   </thead>
	    <tbody>
	    </tbody>
	</table>
	
	<div id="ResultsPaging">
	    <button data-action="prev" class="nav-button pure-button"><?= __('Previous') ?></button>
	    <button data-action="next" class="nav-button pure-button"><?= __('Next') ?></button>
	</div>
</div>

