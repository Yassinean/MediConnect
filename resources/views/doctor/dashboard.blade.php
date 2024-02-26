<x-dashboard-layout>
    <div class="flex justify-between align-center p-5">
        <h1 class="text-white text-4xl">Section des Rendez-Vous </h1>
    </div>
    <div class="RZmKBZs1E1eXw8vkE6jY mlwbuv_bMkMhzTA3msA3">
        <div
            class="_wYiJGbRZyFZeCc8y7Sf _Ybd3WwuTVljUT4vEaM3 mveJTCIb2WII7J4sY22F mngKhi_Rv06PF57lblDI _YxZw_O8dWkTljptcO7z SWDELhWFjL8JxEtm91_o _1jTZ8KXRZul60S6czNi">
            <!-- Card Title -->
            <div class="YRrCJSr_j5nopfm4duUc sJNGKHxFYdN5Nzml5J2j Q_jg_EPdNf9eDMn1mLI2 hD0sTTDgbxakubcHVW2X">
                <div>
                    <h3
                        class="TR_P65x9ie7j6uxFo_Cs vyo_A8gnQD1QWDPglr3h IOPhczRgtphv6NdNBDjj __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">
                        Médicament</h3>
                    <span class="d3C8uAdJKNl1jzfE9ynq _43MO1gcdi2Y0RJW1uHL PeR2JZ9BZHYIH8Ea3F36 XIIs8ZOri3wm8Wnj9N_y">La
                        liste des médicaments disponibles</span>
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
                                            Nom du patient
                                        </th>
                                        <th scope="col"
                                            class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe _fj5qD1qKucIHy44xhzZ upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf OyABRrnTV_kvHV7dJ0uE">
                                            Date &amp; Time
                                        </th>
                                        <th colspan="2"
                                            class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe _fj5qD1qKucIHy44xhzZ upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf OyABRrnTV_kvHV7dJ0uE">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                @unless (count($rendez_vous) == 0)
                                    <tbody class="_Ybd3WwuTVljUT4vEaM3 _1jTZ8KXRZul60S6czNi">
                                        @foreach ($rendez_vous as $s)
                                            <tr>
                                                <td
                                                    class="_wYiJGbRZyFZeCc8y7Sf c8dCx6gnV43hTOLV6ks5 _43MO1gcdi2Y0RJW1uHL __9sbu0yrzdhGIkLWNXl BHrWGjM1Iab_fAz0_91H OyABRrnTV_kvHV7dJ0uE">
                                                    {{ $s->patient->user->name }}
                                                </td>
                                                <td
                                                    class="_wYiJGbRZyFZeCc8y7Sf c8dCx6gnV43hTOLV6ks5 _43MO1gcdi2Y0RJW1uHL PeR2JZ9BZHYIH8Ea3F36 BHrWGjM1Iab_fAz0_91H XIIs8ZOri3wm8Wnj9N_y">
                                                    {{ $s->date }}
                                                </td>
                                                <td class="_wYiJGbRZyFZeCc8y7Sf BHrWGjM1Iab_fAz0_91H">
                                                    @if ($s->isUrgent == true)
                                                        <span class="bg-red-500 text-white text-bold">Urgent</span>
                                                    @else
                                                        <span class="bg-gray-200 text-black text-bold">NotUrgent</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                </table>
                                <p class="w-full text-center text-white font-bold text-lg">No appointments</p>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
