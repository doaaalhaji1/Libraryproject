<style>
    .form-container {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px; /* إضافة مساحة داخلية حول العنصر */
      background-color: transparent; /* إزالة لون الخلفية */
    }

    .form-container label {
      margin-right: 16px;
      white-space: nowrap;
      font-weight: 500; /* زيادة وضوح النص */
    }

    .form-select {
      border-radius: 5px; /* تقويس الزوايا */
      border: 1px solid #ced4da; /* إضافة حدود خفيفة حول القائمة */
      background-color: #ffffff; /* خلفية بيضاء للقائمة */
    }

    .form-select:focus {
      border-color: #80bdff; /* تغيير لون الحد عند التركيز */
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* إضافة ظل عند التركيز */
    }

    .form-label {
      font-size: 1rem; /* حجم الخط */
      color: #495057; /* لون النص */
    }
</style>

<form method="GET" action="{{ route('setLocale') }}" class="d-inline">
    <div class="form-container">
        <label for="locale" class="form-label mt-1">{{ __('public.Choose_Language') }}</label>
        <select name="locale" id="locale" onchange="this.form.submit()" class="form-select form-select-sm">
            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>العربية</option>
        </select>
    </div>
</form>
