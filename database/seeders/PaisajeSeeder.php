<?php

namespace Database\Seeders;

use App\Models\Ecosistema;
use App\Models\Paisaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Primer paisaje
        $paisaje = new Paisaje();
        $paisaje->nombres = 'Islas de la Bahía';
        $paisaje->url = 'images/paisajes/IDLB.jpg';
        $paisaje->descripcion = 'Estas islas son famosas por sus playas de arena blanca, aguas cristalinas y su impresionante biodiversidad marina, que las convierte en un destino ideal para el buceo y el snorkeling. El arrecife de coral de Roatán es uno de los más grandes del mundo.';
        $paisaje->ubicacion = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1956837.0684379705!2d-86.76031299177545!3d16.67951543924737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f69e617faf9546f%3A0x5c3b3787baccb59d!2sIslas%20de%20la%20Bah%C3%ADa!5e0!3m2!1ses!2shn!4v1742180823088!5m2!1ses!2shn';
        $paisaje->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Manglares';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Palmeras cocoteras';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Árboles de caoba';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Tiburones de arrecife (especialmente en Roatán)';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Peces multicolores (como el pez loro y el pez ángel)';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Tortugas marinas (como la tortuga verde y la carey)';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Delfines (frecuentes en las aguas alrededor de Roatán)';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        //Segundo paisaje
        $paisaje = new Paisaje();
        $paisaje->nombres = 'Parque Nacional Pico Bonito';
        $paisaje->url = 'images/paisajes/PicoBonito.jpg';
        $paisaje->descripcion = 'Ubicado en la costa norte, cerca de la ciudad de La Ceiba, este parque es hogar de una exuberante selva tropical y una gran variedad de fauna. Ofrece una excelente oportunidad para el ecoturismo, con senderos que permiten la observación de aves, cascadas y paisajes montañosos.';
        $paisaje->ubicacion = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61468.68605097859!2d-86.93869759124998!3d15.656014099981114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6902521b457f67%3A0xef6fdf52f3d9b044!2sParque%20Nacional%20Pico%20Bonito!5e0!3m2!1ses!2shn!4v1742184955639!5m2!1ses!2shn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade';
        $paisaje->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Helechos tropicales';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Árboles de roble';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Palma de montaña';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Orquídeas (como la Brassavola nodosa)';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Guacamaya roja';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Tucán pico de quilla';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Jaguar';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Ocelote';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Mono aullador';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Ranas venenosas';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        //Tercero paisaje
        $paisaje = new Paisaje();
        $paisaje->nombres = 'Cataratas de Pulhapanzak';
        $paisaje->url = 'images/paisajes/Catarata.jpg';
        $paisaje->descripcion = 'Estas impresionantes cataratas, ubicadas cerca del Lago de Xolotlan en el occidente de Honduras, son una de las más grandes del país. El agua cae desde una altura de 43 metros, creando un espectáculo visual impresionante, rodeado de exuberante vegetación.';
        $paisaje->ubicacion = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3853.42955470603!2d-88.00411632616854!3d15.024338666564576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6676f12434e3a9%3A0x3a906f91ef399161!2sCataratas%20Pulhapanzak!5e0!3m2!1ses!2shn!4v1742185059881!5m2!1ses!2shn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade';
        $paisaje->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Árboles de pino';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Palmas';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Lianas';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Helechos grandes';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Venado de cola blanca';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Pavorreal';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Armadillos';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Nutrias de río';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Pez de río';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        //Cuarto paisaje
        $paisaje = new Paisaje();
        $paisaje->nombres = 'Reserva de la Biosfera de Río Plátano';
        $paisaje->url = 'images/paisajes/Biosfera.jpg';
        $paisaje->descripcion = 'Esta reserva, declarada Patrimonio de la Humanidad por la UNESCO, es un vasto ecosistema que abarca selvas tropicales, humedales y ríos. Es hogar de una increíble biodiversidad, incluyendo especies en peligro de extinción, como el jaguar y el tucán.';
        $paisaje->ubicacion = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3844.0983695416203!2d-84.78136012615741!3d15.532856453576281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f14d0020094dc75%3A0x47b35cf6aa7415ce!2sReserva%20de%20la%20Bi%C3%B3sfera%20del%20R%C3%ADo%20Pl%C3%A1tano........!5e0!3m2!1ses!2shn!4v1742185086971!5m2!1ses!2shn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade';
        $paisaje->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Selva tropical húmeda';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Árboles gigantes como el Almendro y el Ciprés';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Orquídeas y bromelias';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Jaguar';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Tigrillo';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Mono aullador';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Águila arpía';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Guacamaya roja';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Tortugas terrestres';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        //Quinto paisaje
        $paisaje = new Paisaje();
        $paisaje->nombres = 'Playa de Tela';
        $paisaje->url = 'images/paisajes/Tela.jpg';
        $paisaje->descripcion = 'Una de las playas más populares en la costa norte de Honduras, que ofrece extensas zonas de arena dorada y aguas cálidas y cristalinas. Las playas de Tela están rodeadas de paisajes tropicales, como manglares y bosques.';
        $paisaje->ubicacion = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3839.381237862257!2d-87.45641282615173!3d15.783839347017405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f687de43bec79e7%3A0x91bc1b2658fa9614!2sPlaya%20Municipal%20de%20Tela!5e0!3m2!1ses!2shn!4v1742185128748!5m2!1ses!2shn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade';
        $paisaje->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Manglares';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Palmeras';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Flora';
        $ecosistema->nombre = 'Plantas costeras como la Spartina (hierba de mar)';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Tortugas marinas';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Delfines';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Peces como pargos y mero';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();

        $ecosistema = new Ecosistema();
        $ecosistema->tipo = 'Fauna';
        $ecosistema->nombre = 'Aves costeras como garzas y gaviotas';
        $ecosistema->paisaje_id = $paisaje->id;
        $ecosistema->save();
    }
}