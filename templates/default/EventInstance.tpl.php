<div class="event_cal">
<div class='vcalendar'>
	<div class='vevent'>
		<h1 class='summary'><?php echo UNL_UCBCN_Frontend::dbStringToHtml($this->event->title); ?> <a class="permalink" href="<?php echo $this->url; ?>">(link)</a></h1>
		<?php if (isset($this->event->subtitle)) echo '<h2>'.UNL_UCBCN_Frontend::dbStringToHtml($this->event->subtitle).'</h2>'; ?>
<div id="tabsG">
  <ul>
    <li><a href="#" id="event_selected" title="Event Detail"><span>Event Detail</span></a></li>

  </ul>
</div>
			<table>
				<thead>
				<tr>
<th scope="col" class="date">Event Detail</th>

</tr>
				</thead>
		<tbody>
			<tr><td class="date">Date:</td>
				<td><?php echo date('l, F jS',strtotime($this->eventdatetime->starttime)); ?></td></tr>
				
				<tr class="alt"><td class="date">Time:</td>	
					<td><?php
					if (isset($this->eventdatetime->starttime)) {
						if (strpos($this->eventdatetime->starttime,'00:00:00')) {
							echo '<abbr class="dtstart" title="'.date(DATE_ISO8601,strtotime($this->eventdatetime->starttime)).'">All day</abbr>';
						} else {
				        	echo '<abbr class="dtstart" title="'.date(DATE_ISO8601,strtotime($this->eventdatetime->starttime)).'">'.date('g:i a',strtotime($this->eventdatetime->starttime)).'</abbr>';
						}
				    } else {
				        echo 'Unknown';
				    }
				    if (isset($this->eventdatetime->endtime) &&
				    	($this->eventdatetime->endtime != $this->eventdatetime->starttime) &&
				    	($this->eventdatetime->endtime > $this->eventdatetime->starttime)) {
				    	echo '-<abbr class="dtend" title="'.date(DATE_ISO8601,strtotime($this->eventdatetime->endtime)).'">'.date('g:i a',strtotime($this->eventdatetime->endtime)).'</abbr>';
				    }
					?></td></tr>
			
			<tr><td class="date">Description:</td>	
			<td><p class='description'>
			<?php if (isset($this->event->imagedata)) { ?>
				<img src="<?php echo UNL_UCBCN_Frontend::formatURL(array()); ?>?image&amp;id=<?php echo $this->event->id; ?>" alt="image for event <?php echo $this->event->id; ?>" />
			<?php } ?>	
			<?php echo UNL_UCBCN_Frontend::dbStringToHtml($this->event->description); ?></p>
			<?php if (isset($this->event->listingcontactname) ||
						isset($this->event->listingcontactphone) ||
						isset($this->event->listingcontactemail)) { ?>
		
				Contact information:
				<?php if (isset($this->event->listingcontactname)) echo '<div class="n">'.$this->event->listingcontactname.'</div>'; ?>
				<?php if (isset($this->event->listingcontactphone)) echo '<div class="tel">'.$this->event->listingcontactphone.'</div>'; ?>
				<?php if (isset($this->event->listingcontactemail)) echo '<div class="mailto">'.$this->event->listingcontactemail.'</div>'; ?>
		
			<?php } 
			if (isset($this->event->webpageurl)) {
			    echo 'Website: <a class="url" href="'.$this->event->webpageurl.'">'.$this->event->webpageurl.'</a>';
			}
			?></td></tr>
		
		<tr class="alt"><td class="date">Location:</td>
		<td>
			<?php
			$loc = $this->eventdatetime->getLink('location_id');
			if (!PEAR::isError($loc)) {
				echo '<div class="location">'.UNL_UCBCN_Frontend::dbStringToHtml($loc->name);
				if (isset($this->eventdatetime->room)) {
				    echo '<br />Room:'.UNL_UCBCN_Frontend::dbStringToHtml($this->eventdatetime->room);
				}
				echo '</div>';
			}
			?></td></tr>
			<tr><td class="date">Subscription:</td>
		<td>
			<?php
			echo '<p id="feeds">
					<a id="icsformat" href="'.UNL_UCBCN_Frontend::reformatURL($this->url,array('format'=>'ics')).'">ics format for '.UNL_UCBCN_Frontend::dbStringToHtml($this->event->title).'</a>
					<a id="rssformat" href="'.UNL_UCBCN_Frontend::reformatURL($this->url,array('format'=>'rss')).'">rss format for '.UNL_UCBCN_Frontend::dbStringToHtml($this->event->title).'</a>
					</p>'; ?>
			</td></tr>
			</tbody>

</table>
		</div>
		
	</div>
</div>