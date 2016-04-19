<div class="opening-time">
	<h2>Godziny otwarcia</h2>
	<ul>
		<li @if($date->format('l') == 'Monday') class="active" @endif>Poniedziałek <span class="time pull-right">9:00 - 18:00</span></li>
		<li @if($date->format('l') == 'Tuesday') class="active" @endif>Wtorek <span class="time pull-right"> 9:00 - 18:00</span></li>
		<li @if($date->format('l') == 'Wednesday') class="active" @endif>Środa <span class="time pull-right"> 9:00 - 18:00</span></li>
		<li @if($date->format('l') == 'Thursday') class="active" @endif>Czwartek <span class="time pull-right"> 9:00 - 18:00</span></li>
		<li @if($date->format('l') == 'Friday') class="active" @endif>Piątek <span class="time pull-right"> 9:00 - 18:00</span></li>
		<li @if($date->format('l') == 'Saturday') class="active" @endif>Sobota <span class="time pull-right"> 11:00 - 16:00</span></li>
		<li @if($date->format('l') == 'Sunday') class="active" @endif>Niedziela <span class="time pull-right"> zamknięte</span></li>
	</ul>
</div>