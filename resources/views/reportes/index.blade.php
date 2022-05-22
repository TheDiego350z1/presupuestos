<x-app-layout>
    <div class="container mx-auto px-48 pt-5">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded" onclick="location.href='{{ route('generatePDF') }}'">Exportar PDF</button>
        <div class="border-2 border-solid border-indigo-600 text-center">
            <h1>REPORTE MENSUAL 2022-05-01 / 2022-05-31</h1>
        </div>
        <div class="grid grid-cols-2 border-solid border-2">
            <table class="w-full divide-gray-300 border-solid border-2" id="entradasTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50" colspan="2">ENTRADAS</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs font-normal leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Tipo</th>
                        <th class="px-6 py-2 text-xs font-normal leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Monto</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ( $entradas as $entrada )
                        <tr class="leading-4 py-3">
                            <td class="px-6 py-2 leading-4 text-gray-500">{{ $entrada->nombre }}</td>
                            <td class="px-6 py-2 leading-4 text-gray-500 text-right">$ {{ $entrada->TotalIngresos }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="px-2">TOTAL INGRESOS</td>
                        <td class="px-2 text-right" id="sumEntradas">${{$totalEntradas}}</td>
                    </tr>
                </tfoot>
            </table>
            <table class="w-full divide-gray-300 border-solid border-2" id="salidasTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50" colspan="2">ENTRADAS</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="leading-4 py-3">
                        <th class="px-6 py-2 text-xs font-normal leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Tipo</th>
                        <th class="px-6 py-2 text-xs font-normal leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Monto</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ( $salidas as $salida)
                        <tr>
                            <td class="px-6 py-2 leading-4 text-gray-500">{{ $salida->nombre }}</td>
                            <td class="px-6 py-2 leading-4 text-gray-500 text-right">$ {{ $salida->TotalEgresos }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="px-2">TOTAL EGRESOS</td>
                        <td class="text-right px-2" id="sumSalidas">${{ $totalSalidas }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="border-2 border-solid border-indigo-600 text-left">
            <h1 class="px-2">BALANCE: ${{ $balance }}</h1>
        </div>
        <br>
        <br>
        <div class="border-2 border-solid border-indigo-600 text-center">
            <h1>GRAFICO DE BALANCE MENSUAL ENTRADAS VS SALIDAS</h1>
        </div>
        <canvas class="mx-auto" id="myChart" style="width:100%;max-width:700px"></canvas>
    </div>
</x-app-layout>
<script>
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: {{ Js::from($dataGrafico['label']) }},
    datasets: [{
      backgroundColor: barColors,
      data: {{ Js::from($dataGrafico['data'])}}
    }]
  },
  options: {
    title: {
      display: true,
      text: "Gráfica de Balance"
    }
  }
});
</script>
