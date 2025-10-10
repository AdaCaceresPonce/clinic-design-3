<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class QuillRequired implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // Quitar etiquetas HTML y espacios para verificar si hay contenido real
        // Esto es porque con quilljs si se manda el textarea vacio, siempre recibe: "<p><br></p>", y aunque no se vea es considerado como contenido, por eso se debe quitar para verificar
        $text = strip_tags($value);

        //Con trim() se elimina espacios en blanco y caracteres invisibles al inicio y al final
        //Para luego verificar si lo resultante está vacío
        if (empty(trim($text))) {
            $fail('El campo :attribute es obligatorio.');
        }

    }
}
