<?php

namespace Database\Seeders;

use App\Models\Professional;
use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        //Factory de profesionales

        // Professional::factory(20)->create()->each(function(Professional $professional){
        //     $specialties = Specialty::all();
        //     $randomSpecialty = $specialties->random();
        //     $professional->specialties()->attach($randomSpecialty);
        // });

        //Array que contiene los profesionales
        $professionals = [
            [
                'name' => 'Pedro Martínez',
                'lastname' => 'Paredes Matías',
                'description' => 'El Dr. Pedro Martínez es un ortodoncista destacado con más de 15 años de experiencia en la corrección de irregularidades dentales y faciales. Graduado con honores de la Universidad de Madrid, el Dr. Martínez ha dedicado su carrera a ayudar a sus pacientes a lograr sonrisas hermosas y saludables. Su enfoque meticuloso y personalizado en cada caso lo ha convertido en una referencia en el campo de la ortodoncia.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Ortodoncista'], // Especialidades

            ],

            [
                'name' => 'María Isabel',
                'lastname' => 'Rodríguez Fernández',
                'description' => 'La Dra. María Isabel es una periodoncista con más de 20 años de experiencia en el tratamiento de enfermedades de las encías y la colocación de implantes dentales. Se graduó en la Universidad Complutense de Madrid y completó su especialización en periodoncia en la Universidad de Valencia. Con una pasión por la salud periodontal, la Dra. López se ha dedicado a mejorar la calidad de vida de sus pacientes a través de tratamientos efectivos y compasivos.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => '',
                'twitter_link' => '',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Periodoncista'], // Especialidades
            ],

            [
                'name' => 'Juan Carlos',
                'lastname' => 'Pérez Martínez',
                'description' => 'El Dr. Juan Pérez es un odontólogo general con más de 25 años de experiencia en la práctica dental. Se graduó en la Universidad de Sevilla y ha sido un pilar en la comunidad dental local desde entonces. Con un enfoque holístico del cuidado dental, el Dr. Pérez se dedica a proporcionar tratamientos preventivos y restauradores que promuevan la salud bucal a largo plazo.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Dentista'], // Especialidades
            ],

            [
                'name' => 'Isabel Cristina',
                'lastname' => 'López Torres',
                'description' => 'La Dra. Isabel Cristina es una endodoncista altamente capacitada con más de 18 años de experiencia en el tratamiento de enfermedades y lesiones de la pulpa dental. Graduada con honores de la Universidad de Salamanca, la Dra. García se ha destacado por su precisión y habilidad en la realización de tratamientos de conducto, ayudando a innumerables pacientes a salvar sus dientes naturales.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => '',
                'instagram_link' => '',

                'specialties' => ['Endodoncista'], // Especialidades
            ],

            [
                'name' => 'Carolina Sofía',
                'lastname' => 'Torres Rivera',
                'description' => 'La Dra. Carolina Sofía es una odontopediatra dedicada con más de 15 años de experiencia en el cuidado dental infantil. Graduada de la Universidad de Valencia, la Dra. Morales se especializa en hacer que las visitas al dentista sean una experiencia positiva y libre de estrés para los niños. Su enfoque amigable y su habilidad para comunicarse con los pequeños pacientes la han convertido en una figura querida por muchas familias.',
                'photo_path' => '',
                'facebook_link' => '',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => '',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Odontopediatra'], // Especialidades
            ],

            [
                'name' => 'Jorge Luis',
                'lastname' => 'Ramírez Rivas',
                'description' => 'El Dr. Jorge Luis Ramírez Rivas es un dentista altamente capacitado con más de 15 años de experiencia en el campo de la odontología general. Se graduó con honores de la Universidad Nacional Autónoma de México y ha dedicado su carrera a mejorar la salud dental de sus pacientes. A lo largo de su trayectoria, ha adquirido una vasta experiencia en procedimientos como limpiezas, empastes, extracciones y tratamientos de caries, siempre utilizando las técnicas más avanzadas y seguras. Además, el Dr. Ramírez es conocido por su habilidad para realizar procedimientos complejos con precisión y su enfoque compasivo hacia el cuidado del paciente, asegurando siempre una experiencia cómoda y sin dolor. Aparte de su práctica clínica, el Dr. Ramírez participa activamente en programas de educación comunitaria para promover la importancia de la higiene dental, ofreciendo charlas y talleres en escuelas y centros comunitarios. Su dedicación y compromiso con la salud bucal han hecho de él un profesional muy respetado y querido por sus pacientes.',
                'photo_path' => '',
                'facebook_link' => '',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => '',

                'specialties' => ['Dentista'], // Especialidades
            ],

            [
                'name' => 'Luis Miguel',
                'lastname' => 'Rivera Jiménez',
                'description' => 'El Dr. Luis Miguel Rivera Jiménez es un experto periodoncista con un profundo conocimiento en el tratamiento de enfermedades de las encías y la colocación de implantes dentales. Graduado de la Universidad de Chile, el Dr. Rivera ha dedicado su carrera a restaurar la salud periodontal de sus pacientes. Su habilidad para realizar cirugías periodontales complejas, como injertos de encía y regeneración ósea, y su enfoque integral en la prevención y el tratamiento de la enfermedad periodontal lo han establecido como un líder en su especialidad. Además de su práctica clínica, el Dr. Rivera es un ferviente defensor de la educación continua, participando regularmente en conferencias internacionales y publicando artículos en revistas científicas. Su compromiso con la excelencia y su capacidad para manejar casos complejos con éxito lo han convertido en una referencia en el campo de la periodoncia. Los pacientes del Dr. Rivera valoran su enfoque meticuloso y su capacidad para explicar de manera clara y comprensible los procedimientos y tratamientos necesarios.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Periodoncista'], // Especialidades
            ],

            [
                'name' => 'Sofía Elena',
                'lastname' => 'Jiménez Morales',
                'description' => 'La Dra. Sofía Elena Jiménez Morales es una odontopediatra dedicada a proporcionar cuidado dental especializado para niños. Con una formación en odontología pediátrica de la Universidad de São Paulo, la Dra. Jiménez tiene un talento especial para tratar a pacientes jóvenes, asegurando que cada visita al dentista sea una experiencia positiva. Su enfoque en la prevención y el tratamiento temprano de problemas dentales, junto con su capacidad para crear un ambiente amigable y sin estrés, la han convertido en una figura de confianza entre los padres y niños. La Dra. Jiménez utiliza técnicas y equipos adaptados a las necesidades de los niños, haciendo que los tratamientos sean lo más cómodos y efectivos posible. Además, se dedica a educar a los padres y a los niños sobre la importancia de la higiene bucal y los hábitos saludables, participando en programas comunitarios y escolares. Su pasión por el cuidado dental infantil y su dedicación a la excelencia han hecho de la Dra. Jiménez una profesional muy valorada en su campo.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => '',

                'specialties' => ['Odontopediatra'], // Especialidades
            ],

            [
                'name' => 'Andrés Felipe',
                'lastname' => 'Morales Cruz',
                'description' => 'El Dr. Andrés Felipe Morales Cruz es un endodoncista con un enfoque en el tratamiento de conductos radiculares y la conservación de dientes dañados. Formado en la Universidad Nacional de Colombia, el Dr. Morales combina su amplia experiencia clínica con un enfoque meticuloso para garantizar la mejor atención posible a sus pacientes. Es conocido por su capacidad para manejar casos complejos de endodoncia, utilizando técnicas avanzadas y equipos de última generación para realizar tratamientos de conductos, retratamientos y cirugías apicales con alta precisión y éxito. Su compromiso con la educación del paciente sobre la importancia del tratamiento endodóntico y su habilidad para explicar los procedimientos de manera clara y comprensible lo distinguen en su práctica. Además de su trabajo clínico, el Dr. Morales participa activamente en la comunidad dental, impartiendo cursos y talleres sobre endodoncia y publicando investigaciones en revistas especializadas. Su dedicación a la excelencia lo ha convertido en un referente en su campo y un profesional muy respetado por sus colegas y pacientes.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => '',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Endodoncista'], // Especialidades
            ],

            [
                'name' => 'Elena Teresa',
                'lastname' => 'Cruz Vázquez',
                'description' => 'La Dra. Elena Teresa Cruz Vázquez es una dentista comprometida con la salud dental integral de sus pacientes. Graduada de la Universidad de Barcelona, la Dra. Cruz ha trabajado en diversas clínicas de prestigio, proporcionando una amplia gama de servicios dentales, desde limpiezas y rellenos hasta tratamientos estéticos y restaurativos. Su enfoque centrado en el paciente y su habilidad para ofrecer soluciones personalizadas la distinguen en su práctica. Además, la Dra. Cruz es una defensora activa de la salud bucal preventiva y participa en numerosas campañas de concienciación dental. En su práctica diaria, se esfuerza por crear un ambiente acogedor y de confianza, asegurando que sus pacientes se sientan cómodos y bien informados sobre su salud dental. La Dra. Cruz también es conocida por su habilidad para manejar casos complejos con eficacia y su compromiso con la formación continua, asistiendo a cursos y conferencias para mantenerse al día con los últimos avances en odontología. Su dedicación y pasión por la odontología han hecho de ella una profesional muy valorada por sus pacientes y colegas.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => '',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => '',

                'specialties' => ['Dentista'], // Especialidades
            ],

            [
                'name' => 'José Manuel',
                'lastname' => 'Vázquez Ortega',
                'description' => 'El Dr. José Manuel Vázquez Ortega es un ortodoncista con una vasta experiencia en el diseño y aplicación de aparatos ortodónticos. Con una formación avanzada de la Universidad de Sevilla, el Dr. Vázquez se especializa en la corrección de maloclusiones y anomalías dentofaciales. Su enfoque innovador y su dedicación a la mejora estética y funcional de las sonrisas de sus pacientes lo han hecho merecedor de múltiples reconocimientos. El Dr. Vázquez también es un entusiasta de la investigación, contribuyendo a avances significativos en la ortodoncia moderna. Su habilidad para utilizar las últimas tecnologías y técnicas, como los alineadores invisibles y los brackets autoligables, le permite ofrecer tratamientos efectivos y cómodos para sus pacientes. Además, el Dr. Vázquez se dedica a la educación de sus pacientes, asegurando que comprendan completamente sus opciones de tratamiento y los beneficios de cada uno. Su compromiso con la excelencia y su habilidad para crear planes de tratamiento personalizados lo han convertido en un profesional muy respetado en su campo.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => '',
                'instagram_link' => '',

                'specialties' => ['Ortodoncista'], // Especialidades
            ],

            [
                'name' => 'Marta Lucia',
                'lastname' => 'Ortega Guerrero',
                'description' => 'La Dra. Marta Lucia Ortega Guerrero es una periodoncista con una destacada carrera en el tratamiento de enfermedades periodontales y la regeneración ósea. Egresada de la Universidad Complutense de Madrid, la Dra. Ortega combina su profunda comprensión de la biología periodontal con técnicas quirúrgicas avanzadas para ofrecer resultados óptimos a sus pacientes. Su enfoque integral y su habilidad para manejar casos complejos la han establecido como una experta en su campo. La Dra. Ortega también participa activamente en la comunidad dental, impartiendo cursos y talleres sobre salud periodontal y contribuyendo a la formación de nuevos profesionales. Su compromiso con la investigación y su habilidad para aplicar los últimos avances en periodoncia a su práctica diaria aseguran que sus pacientes reciban el mejor cuidado posible. La Dra. Ortega es conocida por su enfoque compasivo y su capacidad para explicar de manera clara y detallada los procedimientos y tratamientos necesarios, lo que ayuda a sus pacientes a sentirse informados y cómodos durante todo el proceso de tratamiento.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => '',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Periodoncista'], // Especialidades
            ],

            [
                'name' => 'Antonio Rafael',
                'lastname' => 'Guerrero Navarro',
                'description' => 'El Dr. Antonio Rafael Guerrero Navarro es un odontopediatra apasionado por el cuidado dental de los niños. Formado en la Universidad de Salamanca, el Dr. Guerrero ha desarrollado un enfoque único para tratar a pacientes jóvenes, utilizando técnicas y herramientas adaptadas a sus necesidades específicas. Su capacidad para crear un entorno acogedor y educativo ha hecho que tanto niños como padres confíen plenamente en su atención. Además, el Dr. Guerrero es un firme defensor de la salud bucal preventiva desde una edad temprana, promoviendo hábitos saludables a través de charlas y talleres en escuelas y comunidades. Su enfoque integral asegura que cada niño reciba un cuidado personalizado y adaptado a sus necesidades, desde la prevención de caries hasta el tratamiento de problemas dentales más complejos. El Dr. Guerrero también se dedica a la formación continua, asistiendo a conferencias y cursos para mantenerse al día con los últimos avances en odontopediatría, lo que le permite ofrecer a sus pacientes el mejor cuidado posible.',
                'photo_path' => '',
                'facebook_link' => 'https://www.facebook.com/',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => 'https://www.twitter.com/',
                'instagram_link' => 'https://www.instagram.com/',

                'specialties' => ['Odontopediatra'], // Especialidades
            ],

            [
                'name' => 'Gabriela María',
                'lastname' => 'Navarro Rojas',
                'description' => 'La Dra. Gabriela María Navarro Rojas es una endodoncista con una sólida trayectoria en el tratamiento y conservación de dientes mediante la terapia de conductos radiculares. Graduada de la Universidad de Valencia, la Dra. Navarro se especializa en tratamientos endodónticos avanzados y microcirugía. Su dedicación a la excelencia clínica y su habilidad para manejar casos complejos con éxito la han posicionado como una líder en su especialidad. Además de su práctica clínica, la Dra. Navarro es una prolífica autora de artículos científicos y ponente en congresos internacionales sobre endodoncia. Su enfoque en la educación del paciente y su capacidad para explicar los procedimientos de manera clara y comprensible han hecho que sus pacientes se sientan informados y cómodos durante todo el proceso de tratamiento. La Dra. Navarro también participa activamente en la comunidad dental, ofreciendo talleres y cursos para otros profesionales de la odontología y contribuyendo a la mejora continua de la práctica endodóntica. Su compromiso con la excelencia y su pasión por la endodoncia la han convertido en una profesional muy respetada y valorada en su campo.',
                'photo_path' => '',
                'facebook_link' => '',
                'linkedin_link' => 'https://www.linkedin.com/',
                'twitter_link' => '',
                'instagram_link' => '',

                'specialties' => ['Endodoncista'], // Especialidades
            ],

            // [
            //     'name' => '',
            //     'lastname' => '',
            //     'description' => '',
            //     'photo_path' => '',
            //     'facebook_link' => 'https://www.facebook.com/',
            //     'linkedin_link' => 'https://www.linkedin.com/',
            //     'twitter_link' => 'https://www.twitter.com/',
            //     'instagram_link' => 'https://www.instagram.com/',
            // ],
        ];

        foreach ($professionals as $professionalData) {

            //Obtener las especialidades del array de datos del profesional
            $professionalSpecialties = $professionalData['specialties'];

            //Remover las especialidades del array de datos del profesional, porque es un campo que no va en la tabla professionals
            unset($professionalData['specialties']);

            //Añadir foto de prueba
            $professionalData['photo_path'] = 'professionals/' . $faker->image('public/storage/professionals', 640, 480, null, false);

            //Registrar el profesional
            $professional = Professional::create($professionalData);

            //Recorre el array de las especilidades del profesional
            foreach ($professionalSpecialties as $specialtyName) {

                // Verificar si existe una especialidad similar antes de crearla
                $existingSpecialty = Specialty::where('name', 'like', $specialtyName)->first();

                if (!$existingSpecialty) {
                    // Si no existe una especialidad similar, la crea
                    $specialty = Specialty::create(['name' => $specialtyName]);
                } else {
                    // Si existe una especialidad similar, usa la existente
                    $specialty = $existingSpecialty;
                }

                // Asocia la especialidad al profesional
                $professional->specialties()->attach($specialty);
            }

        }
    }
}
