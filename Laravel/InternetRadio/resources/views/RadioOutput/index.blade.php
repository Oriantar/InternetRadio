<?php
$index = 1;
?>
@foreach($uploads as $upload)

@if ( $index == $actief->actief)
    
    {{$upload->radio_url}}



@endif
<?php
    $index = $index + 1;
?>
@endforeach


