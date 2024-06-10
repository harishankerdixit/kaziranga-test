@extends('front.layouts.main')
@section('title', $history->title)
@section('meta_title', $history->meta_title)
@section('meta_description', $history->meta_description)
@section('links', 'https://kazirangabooking.com/info')
@section('content')
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="hero_package" class="d-flex align-items-center">
            <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
                <div class="row d-flex justify-content-center align-items-center">
                    <h1 style="color: orangered">About Kaziranga</h1>
                </div>
            </div>
        </section>
        <!-- End Hero -->

        {!! $history->section_1 !!}
        {{-- <section>
            <div class="container">
                <div class="section-title">
                    <h2>HISTORY OF KAZIRANGA NATIONAL PARK</h2>
                </div>

                <p>
                    Kaziranga National Park which is located in the Golaghat and Nagaon
                    districts of the state of Assam has a rich history that dates back
                    to the early 20th century. In 1904, Mary Curzon, the wife of Lord
                    Curzon who was Viceroy of India visited this area and was impressed
                    by the natural beauty and wildlife. She visited to see single-horned
                    rhinoceros but she was unable to see them because they were
                    endangered species. Then she persuaded her husband to take urgent
                    measures to protect them and finally in 1905 Kaziranga National Park
                    was proposed as a reserved forest with an area of 232
                    km<sup>2</sup>.
                </p>
                <p class="my-2">
                    Kaziranga Reserve Forest was officially established back in 1908 and
                    over the years the boundaries of this park expanded. In 1950, it was
                    designated as a wildlife sanctuary. The central government gave this
                    the status of a National Park in the year 1947.
                </p>
                <p class="my-2">
                    Back in the year 1985, Kaziranga National Park was declared a UNESCO
                    World Heritage Site in recognition of its significant conservation
                    efforts and the presence of unique and endangered species,
                    particularly the Indian one-horned rhinoceros. Now it is home to the
                    largest population of this species in the world. Not only Rhinos but
                    this park is home to other animals like wild buffalo, elephants,
                    Royal Bengal tiger, pangolin, swamp deer, etc. Because of the
                    growing number of tigers, this park was declared a Tiger Reserve
                    back in 2006.
                </p>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-title">
                    <h2>FAUNA IN KAZIRANGA</h2>
                </div>

                <p>
                    Kaziranga National Park is filled with various kinds of fauna
                    species. You can see animals here such as one-horned rhinoceroses
                    that are over 2,000 in numbers. Asiatic elephants and Wild Water
                    Buffalo can also be found in large numbers. Apart from these three,
                    you can also spot some herbivores such as swamp deer, hog deer,
                    gaurs, sambar deer, wild boars, barking deer, and more. This park
                    was declared as a Tiger reserve back in 2006 with a large number of
                    Tiger population so those can also be spotted here. You can also
                    find some carnivores here like leopards, jungle cats, fishing cats,
                    Indian gray mongooses, and Bengal foxes. Many small mammals such as
                    sloth bears, hog badgers, Chinese pangolins, and Indian pangolins
                    can also be seen in this wild park.
                </p>
                <p class="my-2">
                    Kaziranga is also the best place to visit for bird watchers because
                    it has over 480 bird species. Black-necked storks, white-fronted
                    geese, greater and lesser adjutants, ferruginous ducks, Asian
                    openbill storks, and many migratory birds are some famous bird
                    species that are seen in this beautiful park.
                </p>
                <p class="my-2">
                    The rivers and other water bodies in Kaziranga are home to the
                    endangered Ganges dolphins, with various fish species and reptiles
                    such as turtles, lizards, tortoises, crocodiles, and snakes.
                </p>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-title">
                    <h2>FLORA IN KAZIRANGA</h2>
                </div>
                <p>
                    Kaziranga National Park is a special place in India where many
                    different plants can be seen. This area has many different kinds of
                    flora. It has alluvial inundated grasslands, tropical wet evergreen
                    forests, and tropical semi-evergreen forests. On the east side of
                    the park, tropical moist mixed deciduous forests, and tropical
                    semi-evergreen forests are there and In the west, where the land is
                    lower, there is a huge grassland area. The main attraction of the
                    park is dense and tall elephant grass intermixed with small
                    swamplands left behind by the receding floodwaters of the river
                    Brahmaputra.
                </p>
                <p class="my-2">
                    Apart from these, the swamps of Kaziranga National Park have water
                    lilies, water hyacinths, and lotus which provide beautiful scenery.
                </p>
                <p class="my-2">
                    In 1986, researchers looked at the flora species of Kaziranga. They
                    found that most of the area, about 41%, was covered with tall
                    elephant grasses. About 29% was covered by open jungle, and 11% had
                    short grasses. Rivers and water took up 8% of the space, while sand
                    covered 6%. The remaining 4% was swamplands. Since Kaziranga became
                    a National Park in 1974, it's been attracting lots of people who
                    love wildlife from all over the world.
                </p>
            </div>
        </section> --}}
    </main>
@endsection
