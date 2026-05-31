
<!DOCTYPE html>
<html lang="en">
<head>
@include ('navbar')


<div style="min-height:100vh; background:#f8fafc; display:flex; align-items:center; justify-content:center; padding:2rem;">
<div style="display:grid; grid-template-columns:1fr 1fr; max-width:900px; width:100%; border-radius:20px; overflow:hidden; box-shadow:0 8px 40px rgba(0,0,0,0.12);">

  {{-- Left panel --}}
  <div style="background:#0f172a; padding:48px 40px; display:flex; flex-direction:column; justify-content:center;">
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:48px;">
      <div style="width:38px; height:38px; background:#2563eb; border-radius:10px; display:flex; align-items:center; justify-content:center;">
        <i class="fa-solid fa-store" style="color:#fff; font-size:16px;"></i>
      </div>
      <span style="font-size:17px; font-weight:700; color:#fff;">QuantumQuik Shop</span>
    </div>
    <h2 style="font-size:26px; font-weight:700; color:#fff; margin-bottom:10px;">Welcome back</h2>
    <p style="font-size:14px; color:#64748b; line-height:1.7; margin-bottom:36px;">Login karein aur apni favourite products explore karein.</p>
    <div style="display:flex; flex-direction:column; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <div style="width:32px; height:32px; background:rgba(37,99,235,0.15); border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <i class="fa-solid fa-bolt" style="color:#3b82f6; font-size:13px;"></i>
        </div>
        <span style="font-size:13px; color:#94a3b8;">Lightning-fast checkout experience</span>
      </div>
      <div style="display:flex; align-items:center; gap:12px;">
        <div style="width:32px; height:32px; background:rgba(37,99,235,0.15); border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <i class="fa-solid fa-shield-halved" style="color:#3b82f6; font-size:13px;"></i>
        </div>
        <span style="font-size:13px; color:#94a3b8;">Secure & encrypted transactions</span>
      </div>
      <div style="display:flex; align-items:center; gap:12px;">
        <div style="width:32px; height:32px; background:rgba(37,99,235,0.15); border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <i class="fa-solid fa-truck" style="color:#3b82f6; font-size:13px;"></i>
        </div>
        <span style="font-size:13px; color:#94a3b8;">Track all your orders in one place</span>
      </div>
    </div>
  </div>

  {{-- Right panel --}}
  <div style="background:#fff; padding:48px 40px; display:flex; flex-direction:column; justify-content:center;">
    <h3 style="font-size:22px; font-weight:700; color:#0f172a; margin-bottom:6px;">Sign in</h3>
    <p style="font-size:14px; color:#64748b; margin-bottom:28px;">Apna account access karein</p>

    @if($errors->any())
      <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:10px; padding:12px 16px; margin-bottom:20px; font-size:13px; color:#dc2626;">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div style="margin-bottom:18px;">
        <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:6px; letter-spacing:0.03em;">EMAIL ADDRESS</label>
        <div style="position:relative;">
          <i class="fa-solid fa-envelope" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:14px;"></i>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="aap@example.com" required
            style="width:100%; height:44px; padding:0 12px 0 38px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; color:#0f172a; outline:none; transition:border 0.2s;"
            onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
        </div>
      </div>

      <div style="margin-bottom:14px;">
        <label style="display:block; font-size:12px; font-weight:600; color:#475569; margin-bottom:6px; letter-spacing:0.03em;">PASSWORD</label>
        <div style="position:relative;">
          <i class="fa-solid fa-lock" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:14px;"></i>
          <input type="password" name="password" id="passField" placeholder="••••••••" required
            style="width:100%; height:44px; padding:0 40px 0 38px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; color:#0f172a; outline:none; transition:border 0.2s;"
            onfocus="this.style.borderColor='#2563eb'" onblur="this.style.borderColor='#e2e8f0'">
          <button type="button" onclick="togglePass()" style="position:absolute; right:12px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#94a3b8; font-size:14px; padding:0;">
            <i class="fa-solid fa-eye" id="eyeIcon"></i>
          </button>
        </div>
      </div>

      <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:22px;">
        <label style="display:flex; align-items:center; gap:6px; font-size:13px; color:#64748b; cursor:pointer;">
          <input type="checkbox" name="remember" style="width:14px; height:14px;"> Remember me
        </label>
        <a href="{{ route('password.request') }}" style="font-size:13px; color:#2563eb; text-decoration:none;">Forgot password?</a>
      </div>

      <button type="submit" style="width:100%; height:44px; background:#2563eb; color:#fff; border:none; border-radius:10px; font-size:14px; font-weight:600; cursor:pointer; transition:background 0.2s; margin-bottom:20px;"
        onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">
        Sign in
      </button>
    </form>

    <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px;">
      <div style="flex:1; height:1px; background:#e2e8f0;"></div>
      <span style="font-size:12px; color:#94a3b8;">or continue with</span>
      <div style="flex:1; height:1px; background:#e2e8f0;"></div>
    </div>

    
    <p style="text-align:center; font-size:13px; color:#64748b;">
      Account nahi hai? <a href="{{ route('register') }}" style="color:#2563eb; text-decoration:none; font-weight:600;">Register karein</a>
    </p>
  </div>

</div>
</div>

<script>
function togglePass(){
  const f=document.getElementById('passField');
  const i=document.getElementById('eyeIcon');
  if(f.type==='password'){f.type='text';i.className='fa-solid fa-eye-slash';}
  else{f.type='password';i.className='fa-solid fa-eye';}
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
