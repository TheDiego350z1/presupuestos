<x-app-layout>
    <div class="container mx-auto px-48 pt-10">
        <div class="grid grid-cols-1">
          <div class="border-2 border-solid border-indigo-600 text-center">
            <h1>REPORTE MENSUAL 2022-05-01 / 2022-05-31</h1>
          </div>
        </div>
        <div class="grid grid-cols-2">
          <div class="border-2 border-solid border-indigo-600 text-center">Entradas</div>
          <div class="border-2 border-solid border-indigo-600 text-center">Salidas</div>
        </div>
          <div class="grid grid-cols-4">
          <div class="border-2 border-solid border-indigo-600 text-center">Tipo</div>
          <div class="border-2 border-solid border-indigo-600 text-center">Monto</div>
          <div class="border-2 border-solid border-indigo-600 text-center">Tipo</div>
          <div class="border-2 border-solid border-indigo-600 text-center">Monto</div>
        </div>
      </div>
      {{var_dump($entradas)}}
      {{var_dump($salidas)}}
</x-app-layout>
