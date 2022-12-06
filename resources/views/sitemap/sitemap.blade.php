@php echo '<?xml version="1.0" encoding="UTF-8"?>' @endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach( $pages as $page)
        <url>

            <loc>{{route($page['route'])}}</loc>

            <lastmod>{{ $page['updated_at'] }}</lastmod>

            <changefreq>{{$page['freq']}}</changefreq>

            <priority>{{$page['priority']}}</priority>

        </url>
    @endforeach
</urlset>
