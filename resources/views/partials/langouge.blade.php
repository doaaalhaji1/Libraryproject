<form method="GET" action="{{ route('setLocale') }}" class="d-inline">
    <div class="form-group">
        <label for="locale" class="form-label">{{__('public.Choose_Language')}}</label>
        <select name="locale" id="locale" onchange="this.form.submit()" class="form-select form-select-sm">
            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>العربية</option>
        </select>
    </div>
</form>
