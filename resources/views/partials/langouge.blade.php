<style>
    .form-container {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container label {
      margin-right: 16px;
      white-space: nowrap;
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
