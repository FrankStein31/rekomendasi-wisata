<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kediri Tourism</title>
    <link href="{{ url('backend/css/styles.css')}}" rel="stylesheet" />
    <link href="{{ url('backend/css/app.css')}}" rel="stylesheet" />
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#Objek Wisata">Objek Wisata</a>
        <a class="nav-link" href="#">About</a>
        <a class="nav-link" href="#">Kontak Kami</a>
      </div>
    <a class="nav-link ms-auto" href="{{ route('login') }}">Login</a>
    </div>
  </div>
</nav>

<!-- Home -->
<div id="Home" class="container">
    <div id="slideshow" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="">
                <h1>Selamat Datang di Kediri Tourism</h1>
                <p>Let's Enjoy Your Trip On Kediri Tourism</p>
            </div>
            <div class="carousel-item active">
                <img src="{{ asset('backend/assets/img/Simpang Lima Gumul Monument.jpg') }}" class="d-block w-100" alt="Simpang Lima Gumul Monument">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('backend/assets/img/Candi Tegowangi.jpg') }}" class="d-block w-100" alt="Another Image">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('backend/assets/img/Kelenteng Tjoe Hwie Kiong.jpg') }}" class="d-block w-100" alt="Yet Another Image">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Objek Wisata -->
<div id="Objek Wisata" class="form-container">
    <div class="content-left" style="flex: 1; padding: 30px;">
        <form id="recommendationForm" action="{{ route('calculation.store') }}" method="POST">
            @csrf
            <h2>Form Rekomendasi Tempat Wisata</h2>
            <p>Anda dapat menginputkan kriteria untuk mendapatkan rekomendasi tempat wisata dari sistem</p>
            <label for="lokasi">Lokasi</label>
            <select id="lokasi" name="lokasi">
                <option value="">Pilih</option>
                @foreach(App\Models\Weight::where('id_criteria', 1)->get() as $weight)
                    <option value="{{ $weight->bobot }}">{{ $weight->nama_bobot }}</option>
                @endforeach
            </select>
            <label for="harga">Harga tiket masuk</label>
            <select id="harga" name="harga">
                <option value="">Pilih</option>
                @foreach(App\Models\Weight::where('id_criteria', 3)->get() as $weight)
                    <option value="{{ $weight->bobot }}">{{ $weight->nama_bobot }}</option>
                @endforeach
            </select>
            <label for="fasilitas">Fasilitas</label>
            <select id="fasilitas" name="fasilitas">
                <option value="">Pilih</option>
                @foreach(App\Models\Weight::where('id_criteria', 4)->get() as $weight)
                    <option value="{{ $weight->bobot }}">{{ $weight->nama_bobot }}</option>
                @endforeach
            </select>
            <label for="jarak">Jarak</label>
            <div id="jarak">
                <div id="map" style="height: 400px;"></div>
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
            </div>
            <button type="submit" id="calculate" class="btn btn-primary float-end">Submit</button>
            <button type="button" class="btn btn-secondary float-start" data-bs-toggle="modal" data-bs-target="#resultModal">Info</button>
        </form>
    </div>
    <div class="content-right" style="flex: 1; margin-left: 30px;">
        <div class="description rounded-top ">
            <h2>keterangan</h2>
            <p><strong>Lokasi</strong></p>
            <p>Sangat Strategis: Lokasi berada daerah wisata utama</p>
            <p>Strategis: Lokasi berada di area yang cukup ramai</p>
            <p>Cukup Strategis: Lokasi berada di area yang cukup ramai</p>
            <p>Kurang Strategis: Lokasi berada daerah yang kurang ramai</p>
            <p>Tidak Strategis: Lokasi berada di daerah yang sepi</p>
            <p><strong>Biaya</strong></p>
            <p>Rp 0 - Rp 5.000: Murah</p>
            <p>Rp 5.001 - Rp 10.000: Sedang</p>
            <p>Rp 10.001 - Rp 15.000: Mahal</p>
            <p>>Rp. 15.000: Sangat Mahal</p>
            <p><strong>Fasilitas</strong></p>
            <p>5 Fasilitas: Tempat parkir; Wahana bermain</p>
            <p>4 Fasilitas: Tempat parkir; Kantin; Toilet; Tempat istirahat</p>
            <p>3 Fasilitas: Tempat parkir; Tempat Istirahat; Toilet</p>
            <p>2 Fasilitas: Tempat parkir; Toilet</p>
            <p>1 Fasilitas: Tempat parkir</p>
        </div>
    </div>
</div>

<!-- About -->
<div id="about" class="container">
    <h2>About Us</h2>
    <p>Welcome to our tourism recommendation system. We are dedicated to helping you find the best tourist spots based on your preferences. Our system allows you to input various criteria such as location, ticket price, facilities, distance, and type of tourist spot to get personalized recommendations.</p>
    <p>Our mission is to make your travel planning easier and more enjoyable by providing accurate and up-to-date information about various tourist destinations. Whether you are looking for a quiet getaway or an adventurous trip, we have got you covered.</p>
    <p>Thank you for using our service. We hope you have a great experience and enjoy your trip!</p>
</div>

<!-- Contact -->
<div id="contact" class="container">
    <div class="content">
        <div class="content-left" style="flex: 1;">
            <h2>Kontak Kami</h2>
            <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui salah satu cara berikut:</p>
            <ul>
                <li>Email: <a href="mailto:info@kediritourism.com">info@kediritourism.com</a></li>
                <li>Telepon: +62 123 4567 890</li>
                <li>Alamat: Jl. Raya Kediri No. 123, Kediri, Jawa Timur, Indonesia</li>
            </ul>
            <p>Atau, Anda dapat mengisi formulir kontak ini dan kami akan segera menghubungi Anda :</p>
        </div>
        <div class="content-right" style="flex: 1; padding: 20px;">
            <form action="/send-message" method="POST" class="p-2">
                @csrf
                <div class="mb-3" style="margin-bottom: 15px;">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<!-- Hasil -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Results</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Wisata</th>
                    <th>Nama Wisata</th>
                    <th>Hasil</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $alternatives = App\Models\Alternative::all();
                    $results = App\Models\Result::all();
                    $hasilArray = $results->pluck('hasil')->toArray();
                    rsort($hasilArray);
                    $topResults = $results->sortByDesc('hasil')->take(10);
                @endphp
                @foreach($topResults as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->code_wisata }}</td>
                    <td>{{ $result->nama_wisata }}</td>
                    <td>{{ $result->hasil }}</td>
                    <td>{{ array_search($result->hasil, $hasilArray) + 1 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="modalResults"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>

@include('includes.footer')

</html>

<!-- Include Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ_ADRt4zr70La0m-JvnqskgYK1uGexCo&callback=initMap&v=weekly&solution_channel=GMP_CCS_geolocation_v2" async defer></script>

<script>
    document.getElementById('calculate').addEventListener('click', function(event) {
        event.preventDefault();

        const formData = new FormData(document.getElementById('recommendationForm'));

        fetch('/calculation/store', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate the modal with the results
                document.getElementById('modalResults').innerHTML = data.results;
                alert('Submit berhasil!');
            } else {
                document.getElementById('modalResults').innerHTML = 'No results found.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('modalResults').innerHTML = 'There was an error fetching the results.';
        });
    });
</script>

<script>
    document.getElementById('recommendationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('{{ route("calculation.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate the modal with the results
                document.getElementById('modalResults').innerHTML = data.results;
                alert('Submit berhasil!');
                $('#resultModal').modal('show');
            } else {
                document.getElementById('modalResults').innerHTML = 'No results found.';
                $('#resultModal').modal('show');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('modalResults').innerHTML = 'There was an error fetching the results.';
            $('#resultModal').modal('show');
        });
    });
</script>

<script>
/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -7.81689500, lng: 112.01139800 },
    zoom: 6,
  });
  infoWindow = new google.maps.InfoWindow();

  const locationButton = document.createElement("button");

  locationButton.textContent = "Pan to Current Location";
  locationButton.type = "button";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(
    locationButton
  );
  locationButton.addEventListener("click", () => {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          document.getElementById('latitude').value = pos.lat;
          document.getElementById('longitude').value = pos.lng;

          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

window.initMap = initMap;
</script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
