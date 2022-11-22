<title>{{ $master['title'] }}</title>
<meta name="google" content="notranslate" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="DC.title" content="{{ $info->name }}" />
<meta name="geo.region" content="VN" />
<meta name="format-detection" content="telephone=no">
<link rel="canonical" href="{{ URL::current() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="robots" content="noodp,index,follow" />
<meta name="googlebot" content="NOODP" />
<meta name="revisit-after" content="1 days" />
<meta name="title" content="{{ $master['title'] }}" />
<meta name="keywords" content="{{ $master['keyword'] }}" />
<meta name="description" content="{{ $master['description'] }}" />
<meta name="author" content="{{ $info->name }}">
<meta name="publisher" content="{{ $info->name }}">
<meta itemprop="name" content="{{ $master['title'] }}" />
<meta itemprop="description" content="{{ $master['description'] }}" />
<meta itemprop="image" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ $master['title'] }}" />
<meta name="twitter:description" content="{{ $master['description'] }}" />
<meta name="twitter:creator" content="{{ $info->author }}" />
<meta name="twitter:image" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta property="og:title" content="{{ $master['title'] }}" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:image" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta property="og:image:secure_url" content="{{ url('/storage/uploads/' . $master['img']) }}" />
<meta property="og:image:alt" content="{{ $master['title'] }}" />
<meta property="og:description" content="{{ $master['description'] }}" />
<meta property="og:site_name" content="{{ $master['title'] }}" />
<meta property="og:site_property" content="{{ URL::current() }}" />
<meta property="og:locale" content="vi_VN" />
<meta property="blog:published_time" content="{{ $master['created_at'] }}" />
<meta property="blog:modified_time" content="{{ $master['updated_at'] }}" />
<meta property="blog:section" content="{{ $master['title'] }}" />
