<?php
	
	
	function d_show_deals_shortcode() {
		
		$deals_tpl_res   = wp_remote_get( 'https://api.mockaroo.com/api/f288a1c0?count=6&key=b60f1fe0' );
	    $deals_res_data  = wp_remote_retrieve_body( $deals_tpl_res );
	    
	
		$data = json_decode($deals_res_data);
				
		
			echo '<div class="container mt-40 mb-40">';
			
			echo '<div class="col-sm-3 mt-20">';
			echo '<h3>Categorias</h3>';	
			echo '<div id="filters-container">';
			echo '<ul id="filter-options-category">';
				echo '<li> <input type="checkbox" value="filter_musica" /> Música </li>';
				echo '<li> <input type="checkbox" value="filter_educacao" /> Educação </li>';
				echo '<li> <input type="checkbox" value="filter_viagem" /> Viagem </li>';
				echo '<li> <input type="checkbox" value="filter_tecnologia" /> Tecnologia</li>';
				echo '<li> <input type="checkbox" value="filter_saude" /> Saúde </li>';
			echo '</ul>';
			echo '</div>';
			echo '</div>';
			
			echo '<div class="col-sm-9">';
				foreach( $data as $deal ) { 
					echo
				        '<div class="column col-sm-4">',
				            '<div class="post-module hover">',
						      '<div class="thumbnail">',
						        '<img ',
				                'class="lazy card-img-top" ',
				                'title="', $deal->deal_name, '" ',
				                'src="', 'https://1.bp.blogspot.com/-yIhXlQfYN1E/WMksG192LLI/AAAAAAAAA9w/txsqdQfykVksDEFshayeN54c0Gu6C3AAwCLcB/s1600/glow.gif', '" ',
				                'data-src="', $deal->card_image, ' "',
				                'data-srcset="', $deal->card_image, '" ',
				                'alt="', $deal->deal_name, '"',
								'>',	
						      '</div>',
						      '<div class="post-content">',
						        '<div class="category">',$deal->category,'</div>',
						        '<h1 class="title">',$deal->deal_name,'</h1>',
						        '<p class="description">',$deal->description, '</p>',
						        '<a ', 
						        'target="_blank"', 
						        ' href="#"', 
						        ' class="btn btn-primary"',
						        ' data-toggle="modal"',
						        ' data-target="',
						        ' #modal-'. $deal->id .'">',
						        'Saiba mais ...', 
						        '</a>',
						      '</div>',
						    '</div>',
				        '</div>';
				        
				    echo 
				    	'<div class="modal fade" id="modal-'. $deal->id .'"', 
				    	'tabindex="-1"', 
				    	'role="dialog"', 
				    	'aria-labelledby="modal-'. $deal->id .'"', 
				    	'aria-hidden="true">',
						  '<div class="modal-dialog">',
						  	'<div class="col-sm-6">',
						  	'<img ',
				                'class="lazy card-img" ',
				                'title="', $deal->deal_name, '" ',
				                'src="', 'https://1.bp.blogspot.com/-yIhXlQfYN1E/WMksG192LLI/AAAAAAAAA9w/txsqdQfykVksDEFshayeN54c0Gu6C3AAwCLcB/s1600/glow.gif', '" ',
				                'data-src="', $deal->card_image, ' "',
				                'data-srcset="', $deal->card_image, '" ',
				                'alt="', $deal->deal_name, '"',
								'>',
						  	'</div>',
						  	'<div class="col-sm-6">',
						        '<button ', 
						        'type="button"', 
						        'class="close"', 
						        'data-dismiss="modal"', 
						        'aria-label="Close">',
						          '<span',
						          'aria-hidden="true">&times;',
						          '</span>',
						        '</button>',
						      '<div ', 
						      'class="modal-body">',
						        '<h4 class="modal-title">'. $deal->deal_name .'</h4>',
						        '<p>'. $deal->description .'</p>',
						        '<a ',
						        'data-sheerid-iframe="true" ', 
						        'target="_blank"', 
						        ' href="https://services.sheerid.com/verify/5be06a4dccc75'. $deal->id .'12d11cf02c/"', 
						        ' class="btn btn-primary">',
						        'Get Offer', 
						        '</a>',
						      '</div>',
						    '</div>',
						  '</div>',
						'</div>';
						
					echo '<script> SheerID.setBaseUrl("https://services-sandbox.sheerid.com/jsapi");', 
						 'SheerID.load("5be06a4dccc75'. $deal->id .'12d11cf02c", "iframe", "1.2", ', 
						 '{ config : { lightbox: true, mobileRedirect: false, mobileThreshold: 600, top: "25px", closeBtnRight: "25px" } }); </script>';	    
				    
				}
			echo '</div>';
			echo '</div>';
	}