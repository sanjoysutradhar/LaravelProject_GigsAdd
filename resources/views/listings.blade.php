<!-- <h1><?php echo $heading; ?></h1> -->

<!-- <?php foreach($listings as $listing): ?>
    <h2><?php echo $listing['title']; ?></h2>
    <p><?php echo $listing['description'];?></p>
<?php endforeach ?> -->
@php
$test=1;
@endphp
{{$test}}

@unless(count($listings)==0)

<h1>{{$heading}}</h1>

@foreach($listings as $listing)
    <h2> {{$listing['title']}} </h2>
    <p> {{$listing['description']}} </p>
@endforeach

@else
<p>No Listings Found</p>
@endunless