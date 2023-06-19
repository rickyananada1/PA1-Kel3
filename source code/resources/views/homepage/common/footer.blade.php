<?php
    $footerData = json_decode(\App\Models\Homepage::where('id', 'footer')->first()->value, true)
?>
@vite(['resources/css/component/footer.css'])
 <footer id="footer" class="footer justify-content-space-between">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4" style="justify-content: space-around">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{ route('homepage') }}" class="logo d-flex align-items-center">
              <span>{{ $footerData['judul']  }}</span>
            </a>
            <p>{{ $footerData['subjudul'] }}</p>
            <div class="social-links mt-3">
              <a href="{{ $footerData['social_media_url']['facebook'] }}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{ $footerData['social_media_url']['twitter'] }}" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="{{ $footerData['social_media_url']['instagram'] }}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="{{ $footerData['social_media_url']['linkedin'] }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
                {{ $footerData['profil']['alamat'] }}<br>
              <strong>Nomor Telepon:</strong> {{ $footerData['profil']['no_phone'] }}<br>
              <strong>Email:</strong> {{ $footerData['profil']['email_addr'] }}<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
          {!! $footerData['catatan_hakcipta'] !!}
      </div>
    </div>
  </footer>
