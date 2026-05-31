
<!DOCTYPE html>
<html lang="en">
<head>
@include ('navbar')

<div style="min-height:100vh; background:#f8fafc; display:flex; align-items:center; justify-content:center; padding:2rem;">
<div style="display:grid; grid-template-columns:1fr 1fr; max-width:920px; width:100%; border-radius:20px; overflow:hidden; box-shadow:0 8px 40px rgba(0,0,0,0.12);">

  {{-- Left Panel --}}
  <div style="background:#0f172a; padding:48px 40px; display:flex; flex-direction:column; justify-content:center;">
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:44px;">
      <div style="width:38px; height:38px; background:#2563eb; border-radius:10px; display:flex; align-items:center; justify-content:center;">
        <i class="fa-solid fa-store" style="color:#fff; font-size:16px;"></i>
      </div>
      <span style="font-size:17px; font-weight:700; color:#fff;">QuantumQuik Shop</span>
    </div>
    <h2 style="font-size:24px; font-weight:700; color:#fff; margin-bottom:10px;">Account banayein</h2>
    <p style="font-size:13px; color:#64748b; line-height:1.7; margin-bottom:32px;">Sirf kuch seconds mein apna free account create karein.</p>
    @foreach([['1','Register karein','Apni basic details fill karein'],['2','Browse karein','Hazaron products explore karein'],['3','Order karein','Fast delivery, easy returns']] as $s)
    <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:20px;">
      <div style="width:26px; height:26px; border-radius:50%; background:#2563eb; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:600; color:#fff; flex-shrink:0; margin-top:2px;">{{ $s[0] }}</div>
      <div style="font-size:13px; color:#94a3b8; line-height:1.6;"><strong style="color:#e2e8f0; font-weight:500;">{{ $s[1] }}</strong><br>{{ $s[2] }}</div>
    </div>
    @endforeach
  </div>

  {{-- Right Panel --}}
  <div style="background:#fff; padding:40px; display:flex; flex-direction:column; justify-content:center;">
    <h3 style="font-size:22px; font-weight:700; color:#0f172a; margin-bottom:4px;">Create account</h3>
    <p style="font-size:13px; color:#64748b; margin-bottom:22px;">Sab kuch free hai — koi credit card nahi chahiye</p>

    @if($errors->any())
      <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:10px; padding:12px 16px; margin-bottom:18px; font-size:13px; color:#dc2626;">
        <ul style="margin:0; padding-left:16px;">
          @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      {{-- Name row --}}
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:14px;">
        <div>
          <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:5px; letter-spacing:0.02em;">FIRST NAME</label>
          <div style="position:relative;">
            <i class="fa-solid fa-user" style="position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px;"></i>
            <input type="text" name="name" value="{{ old('first_name') }}" placeholder="Arjun" required
              style="width:100%; height:41px; padding:0 11px 0 34px; border:1px solid #e2e8f0; border-radius:8px; font-size:13px; color:#0f172a; outline:none;"
              onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
          </div>
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:5px; letter-spacing:0.02em;">LAST NAME</label>
          <div style="position:relative;">
            <i class="fa-solid fa-user" style="position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px;"></i>
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Kumar" required
              style="width:100%; height:41px; padding:0 11px 0 34px; border:1px solid #e2e8f0; border-radius:8px; font-size:13px; color:#0f172a; outline:none;"
              onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
          </div>
        </div>
      </div>

      {{-- Email --}}
      <div style="margin-bottom:14px;">
        <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:5px; letter-spacing:0.02em;">EMAIL ADDRESS</label>
        <div style="position:relative;">
          <i class="fa-solid fa-envelope" style="position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px;"></i>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="aap@example.com" required
            style="width:100%; height:41px; padding:0 11px 0 34px; border:1px solid #e2e8f0; border-radius:8px; font-size:13px; color:#0f172a; outline:none;"
            onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
        </div>
      </div>

      {{-- Phone --}}
      <div style="margin-bottom:14px;">
        <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:5px; letter-spacing:0.02em;">PHONE NUMBER</label>
        <div style="position:relative;">
          <i class="fa-solid fa-phone" style="position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px;"></i>
          <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210"
            style="width:100%; height:41px; padding:0 11px 0 34px; border:1px solid #e2e8f0; border-radius:8px; font-size:13px; color:#0f172a; outline:none;"
            onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
        </div>
      </div>

      {{-- Password --}}
      <div style="margin-bottom:14px;">
        <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:5px; letter-spacing:0.02em;">PASSWORD</label>
        <div style="position:relative;">
          <i class="fa-solid fa-lock" style="position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px;"></i>
          <input type="password" name="password" id="passField" placeholder="••••••••" required oninput="checkStr(this.value)"
            style="width:100%; height:41px; padding:0 38px 0 34px; border:1px solid #e2e8f0; border-radius:8px; font-size:13px; color:#0f172a; outline:none;"
            onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
          <button type="button" onclick="togglePass()" style="position:absolute; right:11px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#94a3b8; font-size:13px; padding:0;">
            <i class="fa-solid fa-eye" id="eyeIcon"></i>
          </button>
        </div>
        <div style="display:flex; gap:4px; margin-top:6px;">
          <div id="s1" style="height:3px; flex:1; border-radius:2px; background:#e2e8f0; transition:background .3s;"></div>
          <div id="s2" style="height:3px; flex:1; border-radius:2px; background:#e2e8f0; transition:background .3s;"></div>
          <div id="s3" style="height:3px; flex:1; border-radius:2px; background:#e2e8f0; transition:background .3s;"></div>
          <div id="s4" style="height:3px; flex:1; border-radius:2px; background:#e2e8f0; transition:background .3s;"></div>
        </div>
        <span id="strLabel" style="font-size:11px; color:#94a3b8;">Password strength</span>
      </div>

      {{-- Confirm Password --}}
      <div style="margin-bottom:16px;">
        <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:5px; letter-spacing:0.02em;">CONFIRM PASSWORD</label>
        <div style="position:relative;">
          <i class="fa-solid fa-lock" style="position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px;"></i>
          <input type="password" name="password_confirmation" placeholder="••••••••" required
            style="width:100%; height:41px; padding:0 11px 0 34px; border:1px solid #e2e8f0; border-radius:8px; font-size:13px; color:#0f172a; outline:none;"
            onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
        </div>
      </div>

      {{-- Terms --}}
      <div style="display:flex; align-items:flex-start; gap:8px; margin-bottom:18px;">
        <input type="checkbox" name="terms" id="terms" required style="margin-top:3px; width:14px; height:14px; cursor:pointer; flex-shrink:0;">
        <label for="terms" style="font-size:12px; color:#64748b; line-height:1.5; cursor:pointer;">
          Main <a href="#" style="color:#2563eb; text-decoration:none;">Terms of Service</a> aur <a href="#" style="color:#2563eb; text-decoration:none;">Privacy Policy</a> se agree karta/karti hoon
        </label>
      </div>

      <button type="submit" style="width:100%; height:41px; background:#2563eb; color:#fff; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; margin-bottom:16px;"
        onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">
        Create account
      </button>
    </form>

    <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
      <div style="flex:1; height:1px; background:#e2e8f0;"></div>
      <span style="font-size:12px; color:#94a3b8;">ya phir</span>
      <div style="flex:1; height:1px; background:#e2e8f0;"></div>
    </div>


    <p style="text-align:center; font-size:13px; color:#64748b;">
      Pehle se account hai? <a href="{{ route('login') }}" style="color:#2563eb; text-decoration:none; font-weight:600;">Login karein</a>
    </p>
  </div>

</div>
</div>

<script>
function togglePass(){
  const f=document.getElementById('passField');
  const i=document.getElementById('eyeIcon');
  f.type=f.type==='password'?'text':'password';
  i.className=f.type==='password'?'fa-solid fa-eye':'fa-solid fa-eye-slash';
}
function checkStr(v){
  let s=0;
  if(v.length>=8)s++;
  if(/[A-Z]/.test(v))s++;
  if(/[0-9]/.test(v))s++;
  if(/[^A-Za-z0-9]/.test(v))s++;
  const c=['','#ef4444','#f97316','#eab308','#22c55e'];
  const l=['','Weak','Fair','Good','Strong'];
  for(let i=1;i<=4;i++)document.getElementById('s'+i).style.background=i<=s?c[s]:'#e2e8f0';
  const lbl=document.getElementById('strLabel');
  lbl.textContent=v.length?l[s]:'Password strength';
  lbl.style.color=c[s]||'#94a3b8';
}
</script>





<!-- Products -->



<!-- Offer Section -->
<section class="offer-section text-white text-center py-5">

    <div class="container">

        <h2 class="fw-bold mb-3">
            50% OFF On New Collection
        </h2>

        <p>Limited Time Offer - Hurry Up!</p>

        <a href="#" class="btn btn-warning btn-lg px-5 rounded-pill">
            Buy Now
        </a>

    </div>

</section>

<!-- Footer -->
<footer>
    <div class="container text-center">

        <p class="mb-0">
            © 2026 Laravel Ecommerce Website | Developed By Arvind
        </p>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
