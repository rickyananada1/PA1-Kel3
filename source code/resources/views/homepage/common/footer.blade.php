@vite(['resources/css/component/footer.css'])
 <footer id="footer" class="footer justify-content-space-between">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4" style="justify-content: space-around">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{ route('homepage') }}" class="logo d-flex align-items-center">
              <span>{{ \App\Models\Homepage::find('judul_brand_footer')->value }}</span>
            </a>
            <p>{{ \App\Models\Homepage::find('subjudul_brand_footer')->value }}</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              {{ \App\Models\Homepage::find('profil_footer_alamat')->value }}<br>
              <strong>Nomor Telepon:</strong> {{ \App\Models\Homepage::find('profil_footer_nophone')->value }}<br>
              <strong>Email:</strong> {{ \App\Models\Homepage::find('profil_footer_alamat_email')->value }}<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        {!! \App\Models\Homepage::find('paragraf_hak_cipta')->value !!}
      </div>
    </div>
  </footer>
