<div class="container">
        <label for="aerodromo_partida">Aerodromo Partida</label>
            <select name="aerodromo_partida" id="aerodromo_partida" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPAR" ? 'selected' : '' }} >LPAR</option>
                <option value="1" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPAV" ? 'selected' : '' }} >LPAV</option>
                <option value="3" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPBG" ? 'selected' : '' }} >LPBG</option>
                <option value="4" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPBJ" ? 'selected' : '' }} >LPBJ</option>
                <option value="5" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPBR" ? 'selected' : '' }} >LPBR</option>
                <option value="6" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPCB" ? 'selected' : '' }} >LPCB</option>
                <option value="7" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPCH" ? 'selected' : '' }} >LPCH</option>
                <option value="8" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPCO" ? 'selected' : '' }} >LPCO</option>
                <option value="9" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPCS" ? 'selected' : '' }} >LPCS</option>
                <option value="10" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPEV" ? 'selected' : '' }} >LPEV</option>
                <option value="11" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPFA" ? 'selected' : '' }} >LPFA</option>
                <option value="12" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPFC" ? 'selected' : '' }} >LPFC</option>
                <option value="13" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPFR" ? 'selected' : '' }} >LPFR</option>
                <option value="14" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPIN" ? 'selected' : '' }} >LPIN</option>
                <option value="15" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPJF" ? 'selected' : '' }} >LPJF</option>
                <option value="16" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPLZ" ? 'selected' : '' }} >LPLZ</option>
                <option value="17" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPMI" ? 'selected' : '' }} >LPMI</option>
                <option value="18" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPMN" ? 'selected' : '' }} >LPMN</option>
                <option value="19" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPMR" ? 'selected' : '' }} >LPMR</option>
                <option value="20" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPMT" ? 'selected' : '' }} >LPMT</option>
                <option value="21" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPMU" ? 'selected' : '' }} >LPMU</option>
                <option value="22" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPOT" ? 'selected' : '' }} >LPOT</option>
                <option value="23" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPOV" ? 'selected' : '' }} >LPOV</option>
                <option value="24" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPPM" ? 'selected' : '' }} >LPPM</option>
                <option value="25" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPPN" ? 'selected' : '' }} >LPPN</option>
                <option value="26" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPPR" ? 'selected' : '' }} >LPPR</option>
                <option value="27" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPPT" ? 'selected' : '' }} >LPPT</option>
                <option value="28" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPSC" ? 'selected' : '' }} >LPSC</option>
                <option value="29" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPSE" ? 'selected' : '' }} >LPSE</option>
                <option value="30" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPSO" ? 'selected' : '' }} >LPSO</option>
                <option value="31" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPSR" ? 'selected' : '' }} >LPSR</option>
                <option value="32" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPST" ? 'selected' : '' }} >LPST</option>
                <option value="33" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPTN" ? 'selected' : '' }} >LPTN</option>
                <option value="34" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPVL" ? 'selected' : '' }} >LPVL</option>
                <option value="35" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPVR" ? 'selected' : '' }} >LPVR</option>
                <option value="36" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "LPVZ" ? 'selected' : '' }} >LPVZ</option>
                <option value="37" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-AIRPARK" ? 'selected' : '' }} >U-AIRPARK</option>
                <option value="38" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-ALQUEIDAO" ? 'selected' : '' }} >U-ALQUEIDAO</option>
                <option value="39" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-ATOUGUIA" ? 'selected' : '' }} >U-ATOUGUIA</option>
                <option value="40" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-AZAMBUJA" ? 'selected' : '' }} >U-AZAMBUJA</option>
                <option value="41" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-BEJA" ? 'selected' : '' }} >U-BEJA</option>
                <option value="42" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-BENAVENTE" ? 'selected' : '' }} >U-BENAVENTE</option>
                <option value="43" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-CAB_BASTO" ? 'selected' : '' }} >U-CAB_BASTO</option>
                <option value="44" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-CAB_VACA" ? 'selected' : '' }} >U-CAB_VACA</option>
                <option value="45" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-CAMPINHO" ? 'selected' : '' }} >U-CAMPINHO</option>
                <option value="46" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-CASARAO" ? 'selected' : '' }} >U-CASARAO</option>
                <option value="47" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-CERVAL" ? 'selected' : '' }} >U-CERVAL</option>
                <option value="48" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-FAIAS" ? 'selected' : '' }} >U-FAIAS</option>
                <option value="49" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-LAGOS" ? 'selected' : '' }} >U-LAGOS</option>
                <option value="50" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-LAMEIRA" ? 'selected' : '' }} >U-LAMEIRA</option>
                <option value="51" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-LAUNDOS" ? 'selected' : '' }} >U-LAUNDOS</option>
                <option value="52" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-LEZIRIAS" ? 'selected' : '' }} >U-LEZIRIAS</option>
                <option value="53" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-PALMA" ? 'selected' : '' }} >U-PALMA</option>
                <option value="54" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-PEGOES" ? 'selected' : '' }} >U-PEGOES</option>
                <option value="55" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-PIAS_LONGAS" ? 'selected' : '' }} >U-PIAS_LONGAS</option>
                <option value="56" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-POMBAL" ? 'selected' : '' }} >U-POMBAL</option>
                <option value="57" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-TOJEIRA" ? 'selected' : '' }} >U-TOJEIRA</option>
                <option value="58" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-VALADAS" ? 'selected' : '' }} >U-VALADAS</option>
                <option value="59" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-VALDONAS" ? 'selected' : '' }} >U-VALDONAS</option>
                <option value="60" {{ old('aerodromo_partida', strval($movimento->aerodromo_partida)) == "U-ZAMBUJEIRA" ? 'selected' : '' }} >U-ZAMBUJEIRA</option>
            </select>
</div>

<div class="container">
        <label for="aerodromo_chegada">Aerodromo Chegada</label>
            <select name="aerodromo_chegada" id="aerodromo_chegada" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                <option value="0" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPAR" ? 'selected' : '' }} >LPAR</option>
                <option value="1" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPAV" ? 'selected' : '' }} >LPAV</option>
                <option value="3" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPBG" ? 'selected' : '' }} >LPBG</option>
                <option value="4" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPBJ" ? 'selected' : '' }} >LPBJ</option>
                <option value="5" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPBR" ? 'selected' : '' }} >LPBR</option>
                <option value="6" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPCB" ? 'selected' : '' }} >LPCB</option>
                <option value="7" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPCH" ? 'selected' : '' }} >LPCH</option>
                <option value="8" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPCO" ? 'selected' : '' }} >LPCO</option>
                <option value="9" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPCS" ? 'selected' : '' }} >LPCS</option>
                <option value="10" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPEV" ? 'selected' : '' }} >LPEV</option>
                <option value="11" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPFA" ? 'selected' : '' }} >LPFA</option>
                <option value="12" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPFC" ? 'selected' : '' }} >LPFC</option>
                <option value="13" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPFR" ? 'selected' : '' }} >LPFR</option>
                <option value="14" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPIN" ? 'selected' : '' }} >LPIN</option>
                <option value="15" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPJF" ? 'selected' : '' }} >LPJF</option>
                <option value="16" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPLZ" ? 'selected' : '' }} >LPLZ</option>
                <option value="17" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPMI" ? 'selected' : '' }} >LPMI</option>
                <option value="18" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPMN" ? 'selected' : '' }} >LPMN</option>
                <option value="19" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPMR" ? 'selected' : '' }} >LPMR</option>
                <option value="20" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPMT" ? 'selected' : '' }} >LPMT</option>
                <option value="21" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPMU" ? 'selected' : '' }} >LPMU</option>
                <option value="22" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPOT" ? 'selected' : '' }} >LPOT</option>
                <option value="23" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPOV" ? 'selected' : '' }} >LPOV</option>
                <option value="24" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPPM" ? 'selected' : '' }} >LPPM</option>
                <option value="25" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPPN" ? 'selected' : '' }} >LPPN</option>
                <option value="26" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPPR" ? 'selected' : '' }} >LPPR</option>
                <option value="27" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPPT" ? 'selected' : '' }} >LPPT</option>
                <option value="28" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPSC" ? 'selected' : '' }} >LPSC</option>
                <option value="29" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPSE" ? 'selected' : '' }} >LPSE</option>
                <option value="30" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPSO" ? 'selected' : '' }} >LPSO</option>
                <option value="31" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPSR" ? 'selected' : '' }} >LPSR</option>
                <option value="32" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPST" ? 'selected' : '' }} >LPST</option>
                <option value="33" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPTN" ? 'selected' : '' }} >LPTN</option>
                <option value="34" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPVL" ? 'selected' : '' }} >LPVL</option>
                <option value="35" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPVR" ? 'selected' : '' }} >LPVR</option>
                <option value="36" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "LPVZ" ? 'selected' : '' }} >LPVZ</option>
                <option value="37" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-AIRPARK" ? 'selected' : '' }} >U-AIRPARK</option>
                <option value="38" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-ALQUEIDAO" ? 'selected' : '' }} >U-ALQUEIDAO</option>
                <option value="39" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-ATOUGUIA" ? 'selected' : '' }} >U-ATOUGUIA</option>
                <option value="40" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-AZAMBUJA" ? 'selected' : '' }} >U-AZAMBUJA</option>
                <option value="41" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-BEJA" ? 'selected' : '' }} >U-BEJA</option>
                <option value="42" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-BENAVENTE" ? 'selected' : '' }} >U-BENAVENTE</option>
                <option value="43" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-CAB_BASTO" ? 'selected' : '' }} >U-CAB_BASTO</option>
                <option value="44" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-CAB_VACA" ? 'selected' : '' }} >U-CAB_VACA</option>
                <option value="45" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-CAMPINHO" ? 'selected' : '' }} >U-CAMPINHO</option>
                <option value="46" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-CASARAO" ? 'selected' : '' }} >U-CASARAO</option>
                <option value="47" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-CERVAL" ? 'selected' : '' }} >U-CERVAL</option>
                <option value="48" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-FAIAS" ? 'selected' : '' }} >U-FAIAS</option>
                <option value="49" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-LAGOS" ? 'selected' : '' }} >U-LAGOS</option>
                <option value="50" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-LAMEIRA" ? 'selected' : '' }} >U-LAMEIRA</option>
                <option value="51" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-LAUNDOS" ? 'selected' : '' }} >U-LAUNDOS</option>
                <option value="52" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-LEZIRIAS" ? 'selected' : '' }} >U-LEZIRIAS</option>
                <option value="53" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-PALMA" ? 'selected' : '' }} >U-PALMA</option>
                <option value="54" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-PEGOES" ? 'selected' : '' }} >U-PEGOES</option>
                <option value="55" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-PIAS_LONGAS" ? 'selected' : '' }} >U-PIAS_LONGAS</option>
                <option value="56" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-POMBAL" ? 'selected' : '' }} >U-POMBAL</option>
                <option value="57" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-TOJEIRA" ? 'selected' : '' }} >U-TOJEIRA</option>
                <option value="58" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-VALADAS" ? 'selected' : '' }} >U-VALADAS</option>
                <option value="59" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-VALDONAS" ? 'selected' : '' }} >U-VALDONAS</option>
                <option value="60" {{ old('aerodromo_chegada', strval($movimento->aerodromo_chegada)) == "U-ZAMBUJEIRA" ? 'selected' : '' }} >U-ZAMBUJEIRA</option>
            </select>
</div>