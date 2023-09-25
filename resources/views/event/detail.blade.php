@extends('layouts.event')

@section('content')
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Event</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">Event</a></li>
                <li>Detail Event</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">
        <div class="col-lg-8">
          <img src="{{ asset($event->thumbnail) }}" alt="" style="display: block; height: auto; width: 100%;">
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>event information</h3>
            <table class="table table-borderless">
              <tr>
                <th>Nama Event</th><th>:</th><td>{{ $event->nama_event }}</td>
              </tr>
              <tr>
                <th>Penyelenggara</th><th>:</th><td>{{ $event->nama_penyelenggara}}</td>
              </tr>
              <tr>
                <th>Nama Event</th><th>:</th><td>{{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }} -
                  {{ \Carbon\Carbon::parse($event->tanggal)->format('H:i') }}</td>
              </tr>
            </table>
            {{-- <ul>
              <li><strong>Nama Event</strong>: {{ $event->nama_event }}</li>
              <li><strong>Penyelenggara</strong>: {{ $event->nama_penyelenggara }}</li>
              <li><strong>Tanggal Event</strong>: {{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }} -
                {{ \Carbon\Carbon::parse($event->tanggal)->format('H:i') }} WIB</li>
            </ul> --}}
          </div>
          <div class="portfolio-description">
            <h2>Detail Event</h2>
            <p>
                {!! $event->detail_event !!}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection