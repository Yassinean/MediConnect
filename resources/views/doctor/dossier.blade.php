<x-dashboard-layout>
    <div class="flex justify-between align-center p-5">
        <h1 class="text-white text-4xl">Section des Dossiers Médicaux </h1>
        <div>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Ajouter un dossier médical
            </button>
        </div>
    </div>
    {{-- start modal --}}
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Ajouter un dossier médical
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('doctor.dossier.store') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="repos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                appointment</label>
                            <select name="rendez_vous_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select appointment...</option>
                                @unless (count($rendez_vous) == 0)
                                    @foreach ($rendez_vous as $r)
                                        <option value="{{ $r->id }}">{{ $r->patient->user->name }}'s appointment
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" selected>No appointments found</option>
                                @endunless
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="repos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres de jours de
                                repos</label>
                            <input type="text" name="repos" id="repos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div class="col-span-2">
                            <label for="notes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Les notes</label>
                            <input type="text" name="notes" id="notes"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <div class="col-span-2">
                            <label for="repos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                drugs</label>
                            <select name="drugs[]" multiple
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select drugs...</option>
                                @unless (count($drugs) == 0)
                                    @foreach ($drugs as $r)
                                        <option value="{{ $r->id }}">{{ $r->MedicamentName }}</option>
                                    @endforeach
                                @else
                                    <option value="" selected>No drugs found</option>
                                @endunless
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Ajouter
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    <div class="RZmKBZs1E1eXw8vkE6jY mlwbuv_bMkMhzTA3msA3">
        <div
            class="_wYiJGbRZyFZeCc8y7Sf _Ybd3WwuTVljUT4vEaM3 mveJTCIb2WII7J4sY22F mngKhi_Rv06PF57lblDI _YxZw_O8dWkTljptcO7z SWDELhWFjL8JxEtm91_o _1jTZ8KXRZul60S6czNi">
            <!-- Card Title -->
            <div class="YRrCJSr_j5nopfm4duUc sJNGKHxFYdN5Nzml5J2j Q_jg_EPdNf9eDMn1mLI2 hD0sTTDgbxakubcHVW2X">
                <div>
                    <h3
                        class="TR_P65x9ie7j6uxFo_Cs vyo_A8gnQD1QWDPglr3h IOPhczRgtphv6NdNBDjj __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">
                        Dossiers Médicaux</h3>
                    <span
                        class="d3C8uAdJKNl1jzfE9ynq _43MO1gcdi2Y0RJW1uHL PeR2JZ9BZHYIH8Ea3F36 XIIs8ZOri3wm8Wnj9N_y">Les
                        Dossiers Médicaux</span>
                </div>
                <div class="VQS2tmQ_zFyBOC2tkmto">
                    <a href="#"
                        class="FJRldeiG2gFGZfuKgp88 c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe mveJTCIb2WII7J4sY22F OQflBVxALl1Ntbyc2J2_ _7KA5gD55t2lxf9Jkj20 fZf6W_ZtzEh6EEqmWMA9 OPrb_iG5WDy_7F05BDOX">View
                        all</a>
                </div>
            </div>
            <!-- Table -->
            <div class="YRrCJSr_j5nopfm4duUc e8VqoQNK0mbkRFDL3LMV R2oNx0cNtxO_M_VVt390">
                <div class="_IebywwKB6L2zG0BTy63 mveJTCIb2WII7J4sY22F">
                    <div class="VPGGthdu3cy_ZP7AL7dt TK9h2c2b79uBgR_cJzCE u0Aizb1ol0gBXDISYKJM">
                        <div class="wBVMFkIGfrKshbvi2gS1 mngKhi_Rv06PF57lblDI PTS4x_A1HVmoZYJHkYaG">
                            <table
                                class="TK9h2c2b79uBgR_cJzCE Zy1Pypi71Xu6guex6urN NIAblPiyeuYQ0zW671xb PoeKYEQfG4WfmL9xM6vu">
                                <thead class="jtAJHOc7mn7b4IKRO59D jqg6J89cvxmDiFpnV56r">
                                    <tr>
                                        <th scope="col"
                                            class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe _fj5qD1qKucIHy44xhzZ upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf OyABRrnTV_kvHV7dJ0uE">
                                            Nom du Patient
                                        </th>
                                        <th scope="col"
                                            class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe _fj5qD1qKucIHy44xhzZ upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf OyABRrnTV_kvHV7dJ0uE">
                                            Date De Consultation
                                        </th>
                                        <th scope="col"
                                            class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe _fj5qD1qKucIHy44xhzZ upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf OyABRrnTV_kvHV7dJ0uE">
                                            Jours Repos
                                        </th>
                                        <th colspan="2"
                                            class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe _fj5qD1qKucIHy44xhzZ upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf OyABRrnTV_kvHV7dJ0uE">
                                            Notes
                                        </th>
                                    </tr>
                                </thead>
                                @unless (count($dossiers) == 0)
                                    <tbody class="_Ybd3WwuTVljUT4vEaM3 _1jTZ8KXRZul60S6czNi">
                                        @foreach ($dossiers as $s)
                                            <tr>
                                                <td
                                                    class="_wYiJGbRZyFZeCc8y7Sf c8dCx6gnV43hTOLV6ks5 _43MO1gcdi2Y0RJW1uHL __9sbu0yrzdhGIkLWNXl BHrWGjM1Iab_fAz0_91H OyABRrnTV_kvHV7dJ0uE">
                                                    {{ $s->rendezvous->patient->user->name }}
                                                </td>
                                                <td
                                                    class="_wYiJGbRZyFZeCc8y7Sf c8dCx6gnV43hTOLV6ks5 _43MO1gcdi2Y0RJW1uHL PeR2JZ9BZHYIH8Ea3F36 BHrWGjM1Iab_fAz0_91H XIIs8ZOri3wm8Wnj9N_y">
                                                    {{ $s->created_at }}
                                                </td>
                                                <td
                                                    class="_wYiJGbRZyFZeCc8y7Sf c8dCx6gnV43hTOLV6ks5 yM_AorRf2jSON3pDsdrz __9sbu0yrzdhGIkLWNXl BHrWGjM1Iab_fAz0_91H OyABRrnTV_kvHV7dJ0uE">
                                                    {{ $s->repos }}
                                                </td>
                                                <td
                                                    class="_wYiJGbRZyFZeCc8y7Sf c8dCx6gnV43hTOLV6ks5 yM_AorRf2jSON3pDsdrz __9sbu0yrzdhGIkLWNXl BHrWGjM1Iab_fAz0_91H OyABRrnTV_kvHV7dJ0uE">
                                                    {{ $s->notes }}
                                                </td>
                                                <td class="_wYiJGbRZyFZeCc8y7Sf BHrWGjM1Iab_fAz0_91H">
                                                    <form action="{{ route('medicament.delete', $s->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>

                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="max-w-2xl mx-auto">

                                                        <!-- Modal toggle -->
                                                        <button
                                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                            type="button"
                                                            data-modal-target="authentication-modal{{ $s->id }}"
                                                            data-modal-toggle="authentication-modal{{ $s->id }}">
                                                            Modifier
                                                        </button>

                                                        <!-- Main modal -->
                                                        <div id="authentication-modal{{ $s->id }}"
                                                            aria-hidden="true"
                                                            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                                                                <!-- Modal content -->
                                                                <div
                                                                    class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                                                    <div class="flex justify-end p-2">
                                                                        <button type="button"
                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                            data-modal-toggle="authentication-modal{{ $s->id }}">
                                                                            <svg class="w-5 h-5" fill="currentColor"
                                                                                viewBox="0 0 20 20"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                    clip-rule="evenodd"></path>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                                                                        action="{{ route('medicament.ModiMedicament', ['id' => $s->id]) }}"
                                                                        method="POST" class="p-4 md:p-5">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <h3
                                                                            class="text-xl font-medium text-gray-900 dark:text-white">
                                                                            Modifier médicament</h3>
                                                                        <div>
                                                                            <label for="name"
                                                                                class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Nouvel
                                                                                médicament </label>
                                                                            <input type="text" id="name"
                                                                                name="nom"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                required="">
                                                                        </div>
                                                                        <div>
                                                                            <label for="price"
                                                                                class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Nouvel
                                                                                prix </label>
                                                                            <input type="text" id="prix"
                                                                                name="price"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                required="">
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="w-full text-center text-white font-bold text-lg">Aucun dossier médicaux</p>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
