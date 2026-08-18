@extends('layout.layout')
@section('body')

@section('title')
Ayuda
@endsection

<main class="min-h-screen px-5 bg-gray-50 dark:bg-gray-800 border-l-2 border-gray-300 dark:border-gray-700">
    <x-header2>
        Por qué
        <x-span-app-name />
        te pide tu dirección de correo electrónico o número de teléfono celular y cómo los usa
    </x-header2>

    <p>Cuando agregas una dirección de correo electrónico o un número de
        teléfono a tu cuenta de <x-span-app-name/>, podemos usarlos para ayudarte a iniciar sesión, recibir notificaciones o
        proteger tu cuenta.</p>
    <x-header2 class="pt-10">
        Cómo <x-span-app-name/> usa tu número de teléfono o dirección de correo electrónico
    </x-header2>

    <ul class="px-4">
        <li type="disc">
            Ayudarte a iniciar sesión. Si olvidas tu contraseña, necesitas un número de celular o una dirección de
            correo electrónico actualizados para restablecerla.
        </li>
        <li type="disc">
            Enviarte notificaciones por mensajes de texto (SMS) o correo electrónico con actualizaciones sobre la
            actividad reciente de tu cuenta, promociones y la seguridad de la cuenta. Las notificaciones por mensajes de
            texto (SMS) y correo electrónico pueden ayudar a proteger tu cuenta mediante funciones opcionales, como la
            autenticación en dos pasos para los números de celular y las alertas por correo electrónico sobre cambios en
            la información de la cuenta. Nota: Puedes desactivar todas las notificaciones por mensajes de texto (SMS) y
            correo electrónico en cualquier momento (excepto las notificaciones relacionadas a la seguridad de tu
            cuenta).
        </li>
        <li type="disc">
            Conectarte con otras personas o contenidos en nuestras plataformas, incluida la posibilidad de utilizar tus
            contactos para recomendarte cuentas que puedes seguir.
        </li>
        <li type="disc">
            Mostrar anuncios que tú y otros ven y mejorarlos. Buscamos coincidencias entre tu información de contacto e
            información que obtenemos de otras fuentes (por ejemplo, cuando haces una compra después de ver un anuncio
            en <x-span-app-name/>). Eso nos ayuda a mejorar nuestros servicios publicitarios para todos los que forman parte de
            la comunidad de <x-span-app-name/>.
        </li>
    </ul>
    <p class="mt-5">Es posible que, cuando te solicitemos que agregues tu información de contacto, veas una sugerencia
        de número de
        celular o correo electrónico. Ten en cuenta que el número de teléfono celular o correo electrónico que te
        pedimos que confirmes se agregará a tu cuenta solo si eliges hacerlo.</p>

    <x-header2>
        Por qué se te puede pedir que confirmes tu número de teléfono celular o correo electrónico
    </x-header2>

    <ul class="px-4">
        <li type="disc">
            Agregaste tu número de celular o correo electrónico, pero no lo confirmaste.
        </li>
        <li type="disc">
            Pasó mucho tiempo desde la última vez que agregaste o actualizaste tu número de celular o correo
            electrónico.
        </li>
        <li type="disc">
            Recibimos información de tu dispositivo que nos ayuda a sugerir el número de celular o correo electrónico
            que está asociado a este.
        </li>
        <li type="disc">
            Aún no agregaste un número, y queremos mostrarte cómo hacerlo.
        </li>
    </ul>

    <p class="mt-5">
        <span class="font-bold">
            Nota:
        </span>
        Los números de celular y correos electrónicos siempre son privados en las cuentas de <x-span-app-name/>. Puedes eliminar
        de tu cuenta un número de celular o una dirección de correo electrónico confirmados en cualquier momento,
        siempre y cuando quede al menos un número de celular o una dirección de correo electrónico que hayas confirmado
        en tu cuenta. Descubre cómo actualizar tu información personal en
        <x-span-app-name />.
    </p>

    <p class="py-5">
        Nunca vendemos información personal, como tu número de celular o correo electrónico. Para obtener más
        información sobre cómo <x-span-app-name/> utiliza tu número de teléfono o correo electrónico, consulta nuestra Política
        de datos.
    </p>
</main>
@endsection