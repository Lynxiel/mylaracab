<footer>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6  footer-menu">
                <h4 class="rubik-bold text-white text-uppercase">Меню</h4>
                <ul class="nav flex-column justify-content-between">
                    <x-controls.list text="Главная" route="index" classes=" nav-link p-0 m-0 text-white" color="secondary"/>
                    <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link p-0 m-0 text-white" color="secondary"/>
                    <x-controls.list text="О нас" route="about_us" classes="nav-link p-0 m-0 text-white " color="secondary" />
                    <x-controls.list text="Политика конфиденциальности" route="politics" classes="nav-link p-0 m-0 text-white fs-6" color="secondary" />
                    <x-controls.list text="Согласие на обработку персональных данных" route="agreement" classes="nav-link p-0 m-0 text-white" color="secondary" />
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-6 company-contacts">
                <h4 class="rubik-bold text-white text-uppercase">Контакты</h4>
                <ul class="nav flex-column ">
                    <li class="nav-item mb-2"><a class="text-white" href="mailto:tricolor-nsk@mail.ru">tricolor-nsk@mail.ru</a></li>
                    <li class="nav-item mb-2 text-white"><a class="text-white" href="tel:+7-953-954-20-16">+7-953-954-20-16</a> </li>
                    <li class="nav-item mb-2 text-white">г.Новомосковск</li>
                    <li class="nav-item mb-2 text-white">ул. Садовского д.34</li>
                    <ul class="nav col-md-12 justify-content-start list-unstyled d-flex social-links mt-2">
                        <li class="m-0"><a id="vk" class="text-white" href="https://vk.com/elektrika71"><img src="{{asset('images/vk.png')}}"></a></li>
                        <li class="m-0"><a id="tg" class="text-white" href="https://t.me/elektrikanmk"><img src="{{asset('images/tg.png')}}"> </a></li>
                        <li class="m-0"><a id="wa" class="text-white" href="https://t.me/elektrikanmk"><img src="{{asset('images/wa.png')}}"></a></li>
                    </ul>
                </ul>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12  col-12 mt-4 mt-md-0">
                <h4 class="rubik-bold text-white text-uppercase">Связаться с нами</h4>
                <form action="{{route('contact_us')}}" method="post">
                    @csrf
                    <div class="form-group ">
                        <x-controls.input name="email" placeholder="Email" type="email" required="1" type="text"  value="{{ auth()->user()->email ?? ''}}" />
                    </div>
                    <div class="form-group mt-2">
                        <textarea placeholder="Ваше сообщение" class="form-control" name="message" required></textarea>
                        @error('message')<div class="alert alert-danger mt-1">{{$message}}</div>@enderror
                    </div>
                    <input type="submit" class="btn btn-orange mt-2">
                </form>
            </div>
        </div>




        <div class="justify-content-center text-center text-white company-name ">
            © {{ date('Y') }} ИП Кондратьев А.С.
        </div>
    </div>
    <div class="position-relative">
        <img id="linesf" class="position-absolute bottom-0 end-0" src="{{asset('images/linesf.svg')}}">
    </div>
</footer>

<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2aecac75b358a6d10ac59051e500a2345a3538f1563e36dd85f799fdc16535f9&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script></div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(91549642, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/91549642" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
