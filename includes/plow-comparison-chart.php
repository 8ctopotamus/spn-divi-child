<?php 

$plowQuery = get_query_var( 'plowsToCompare' );
if ($plowQuery) {
	$plowSlugs = [];
	foreach(explode('__vs__', $plowQuery) as $brandModel) {
		$plowSlugs[] = explode('_', $brandModel)[1];
	}

	$plows = [];
	
	$specsToShow = [
		'Availability',
		'Plow Type',
		'Paint',
		'E-Coat Primer',
		'Controls Style',
		'Controls Type',
		'Mount',
		'Snow Deflector',
		'Down Pressure',
		'Closed Loop Electric',
		'LED Lights',
		'Blade Width',
		'Angled Blade Width',
		'Blade Height (min)',
		'Blade Height (max)',
		'Blade Gauge',
		'Blade Thickness',
		'Blade Weight',
		'Blade Material',
		'Plow Shoes',
		'Blade Cutting Edge Thickness',
		'Blade Cutting Edge Height',
		'Vertical Ribs',
		'Trip Feature',
		'Trip Springs',
		'Trip Spring Type',
		'Angle Cylinder Diameter',
		'Angle Cylinder Length',
		'Lift Cylinder Diameter',
		'Lift Cylinder Length',
	];
	
	function createSpecGrid($spec, $plows) {
		$key = strtolower( implode( '_', explode(' ', $spec) ) );
		$html = '<div class="spec-grid" style="grid-template-columns: repeat('. (count($plows) + 1) .', 1fr);">';
			$html .= '<div>';
				$html .= $spec;
			$html .= '</div>';
			foreach($plows as $p) {
				$html .= '<div>';
					if ($p->acf[$key]) {
						$html .= $p->acf[$key];
					}
				$html .= '</div>';
			}
		$html .= '</div>';
		return $html;
	}
	
	if ($plowSlugs) {
		foreach($plowSlugs as $slug) {
			$p = get_page_by_path( $slug, 'OBJECT', 'plows' );
			$terms = get_the_terms( $p->ID, 'plow_categories' );
			$p->manufacturer = $terms[0]->name;
			$p->acf = get_fields($p->ID);
			$p->featured_image = get_the_post_thumbnail_url($p->ID);
			$plows[] = $p;
		}
	
		?>
		
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>SNOW PLOW NEWS</div>
			<?php foreach($plows as $p) { 
				if ($p->featured_image) { ?>
				<div>
					<img src="<?php echo $p->featured_image; ?>"  />
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Price</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['price']) { ?>
				<div>
					<?php echo $p->acf['price']; ?>
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Moving Capacity</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['moving_capacity']) { ?>
				<div>
					<?php echo $p->acf['moving_capacity']; ?>
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>SPN Rating</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['spn_rank']) { ?>
				<div>
					<?php echo floor($p->acf['spn_rank'] / 100 * 10); ?>
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Warranty</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['warranty']) { ?>
				<div>
					<?php echo $p->acf['warranty']; ?>
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Product Video</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['youtube_video_id']) { ?>
				<div>
					<a 
						href="https://www.youtube.com/watch?v=<?php echo $p->acf['youtube_video_id']; ?>"
						target="_blank"
						rel="noreferrer noopener"
						title="Watch Product Video"
					>
						Watch Video
					</a>
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Product PDF</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['pdf']) { ?>
				<div>
					<img src="<?php echo $p->acf['pdf']; ?>"  />
					<a 
						href="http://snowplownews.com/cm/pdfs/<?php echo $p->acf['pdf']; ?>"
						target="_blank"
						rel="noreferrer noopener"
						title="View Product PDF"
						download
					>
						Watch Video
					</a>
				</div>
				<?php }
			} ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Does It Fit?</div>
			<?php foreach($plows as $p) { ?>
				<div>
					<a href="https://www.snoway.com/what-plow-fits-my-truck/" target="_blank" rel="noreferrer noopener">Click Here</a> to see if this plow will fit your exact model truck.
				</div>
			<?php } ?>
		</div>
	
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>Where to Buy?</div>
			<?php foreach($plows as $p) { 
				if ($p->acf['mfg_id']) { ?>
				<div>
					Find a Sno-Way Dealer near you.
					<form name="findDealerByBrand" action="//dealers.snowplownews.com?bd=1" method="post" target="_blank">
						<input type="hidden" name="mfg_id" value="<?php echo $p->acf['mfg_id']; ?>" />
						<input type="hidden" name="distance" value="50"/>
						<input type="hidden" name="locationsubmitted" value="1"/>
						<input type="text" name="postalcode" placeholder="Zipcode"/> 
						<input type="submit" value="Find Dealers"/>
					</form>
				</div>
				<?php }
			} ?>
		</div>
		
		<!-- SPECS -->
		<div class="spec-grid" style="grid-template-columns: repeat(<? echo (count($plows) + 1); ?>, 1fr);">
			<div>SPECS</div>
			<?php foreach($plows as $p) { ?>
				<div>
					<?php echo $p->manufacturer; ?>
					<?php echo $p->post_title; ?>
				</div>
			<?php } ?>
		</div>
		<?php
		foreach($specsToShow as $spec) {
			echo createSpecGrid($spec, $plows);
		}
	}
}


