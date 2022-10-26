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
                    <ul class="nav col-md-12 justify-content-start list-unstyled d-flex">
                        <li class="ms-3"><a class="text-white" href="https://vk.com/elektrika71"><img src="{{asset('images/vk.png')}}"></a></li>
                        <li class="ms-3"><a class="text-white" href="https://t.me/elektrikanmk"><img src="{{asset('images/tg.png')}}"> </a></li>
                        <li class="ms-3"><a class="text-white" href="https://t.me/elektrikanmk"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                    </ul>
                </ul>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12  col-12 mt-4 mt-md-0">
                <h4 class="rubik-bold text-white text-uppercase">Связаться с нами</h4>
                <form action="" method="post">
                    <div class="form-group ">
                        <x-controls.input name="name" placeholder="Имя" type="text" required="1" type="text"  value="{{old('name')}}" />
                    </div>
                    <div class="form-group mt-2">
                        <textarea placeholder="Ваше сообщение" class="form-control" name="message" required></textarea>
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

