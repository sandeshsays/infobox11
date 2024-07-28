
    $("#birth_date_ad").on("change", function() {
        convertAdtoBs("#birth_date_ad", "#birth_date_bs");
    });

    $("#birth_date_bs").on("change", function() {
        convertBstoAd("#birth_date_bs", "#birth_date_ad");
    });

    $("#dob_ad").on("change", function() {
        convertAdtoBs("#dob_ad", "#dob_bs");
    });

    $("#dob_bs").on("change", function() {
        convertBstoAd("#dob_bs", "#dob_ad");
    });

    $("#applicant_dob_ad").on("change", function() {
        convertAdtoBs("#applicant_dob_ad", "#applicant_dob_bs");
    });

    $("#applicant_dob_bs").on("change", function() {
        convertBstoAd("#applicant_dob_bs", "#applicant_dob_ad");
    });

    $("#searchcitizenship_issued_date_bs").change(function() {
        convertBstoAd(
            "#searchcitizenship_issued_date_bs",
            "#searchcitizenship_issued_date_ad"
        );
    });
    $("#searchcitizenship_issued_date_ad").change(function() {
        convertAdtoBs(
            "#searchcitizenship_issued_date_ad",
            "#searchcitizenship_issued_date_bs"
        );
    });

    $("#grandfather_citizenship_issued_date_bs").change(function() {
        convertBstoAd(
            "#grandfather_citizenship_issued_date_bs",
            "#grandfather_citizenship_issued_date_ad"
        );
    });
    $("#grandfather_citizenship_issued_date_ad").change(function() {
        convertAdtoBs(
            "#grandfather_citizenship_issued_date_ad",
            "#grandfather_citizenship_issued_date_bs"
        );
    });
    $("#father_citizenship_issued_date_bs").change(function() {
        convertBstoAd(
            "#father_citizenship_issued_date_bs",
            "#father_citizenship_issued_date_ad"
        );
    });
    $("#father_citizenship_issued_date_ad").change(function() {
        convertAdtoBs(
            "#father_citizenship_issued_date_ad",
            "#father_citizenship_issued_date_bs"
        );
    });
    $("#mother_citizenship_issued_date_bs").change(function() {
        convertBstoAd(
            "#mother_citizenship_issued_date_bs",
            "#mother_citizenship_issued_date_ad"
        );
    });
    $("#mother_citizenship_issued_date_ad").change(function() {
        convertAdtoBs(
            "#mother_citizenship_issued_date_ad",
            "#mother_citizenship_issued_date_bs"
        );
    });

    $("#married_date_bs").change(function() {
        convertBstoAd("#married_date_bs", "#married_date_ad");
    });
    $("#married_date_ad").change(function() {
        convertAdtoBs("#married_date_ad", "#married_date_bs");
    });

    $("#namsari_date_ad").on("change", function() {
        convertAdtoBs("#namsari_date_ad", "#namsari_date_bs");
    });

    $("#namsari_date_bs").on("change", function() {
        convertBstoAd("#namsari_date_bs", "#namsari_date_ad");
    });
    $("#darta_date_bs").change(function() {
        convertBstoAd("#darta_date_bs", "#darta_date_ad");
        var darta_date_ad = new Date($("#darta_date_ad").val());
        var application_date_ad = new Date($("#application_date_ad").val());
        // alert(darta_date_ad); alert(application_date_ad);
        if (darta_date_ad.getTime() < application_date_ad.getTime()) {
            alert("निबेदन मिति दर्ता मिति भन्दा बढी भयो !!");
            $("#application_date_bs").focus();
            $("#application_date_bs").val("");
            $("#application_date_ad").val("");
        }
    });
    $("#darta_date_ad").change(function() {
        convertAdtoBs("#darta_date_ad", "#darta_date_bs");
        var darta_date_ad = new Date($("#darta_date_ad").val());
        var application_date_ad = new Date($("#application_date_ad").val());
        // alert(darta_date_ad); alert(application_date_ad);
        if (darta_date_ad.getTime() < application_date_ad.getTime()) {
            alert("निबेदन मिति दर्ता मिति भन्दा बढी भयो !!");
            $("#application_date_bs").focus();
            $("#application_date_bs").val("");
            $("#application_date_ad").val("");
        }
    });

    $("#application_date_bs").change(function() {
        convertBstoAd("#application_date_bs", "#application_date_ad");
        var darta_date_ad = new Date($("#darta_date_ad").val());
        var application_date_ad = new Date($("#application_date_ad").val());
        // alert(darta_date_ad); alert(application_date_ad);
        if (darta_date_ad.getTime() < application_date_ad.getTime()) {
            alert("निबेदन मिति दर्ता मिति भन्दा बढी भयो !!");
            $("#application_date_bs").focus();
            $("#application_date_bs").val("");
            $("#application_date_ad").val("");
        }
    });
    $("#application_date_ad").change(function() {
        convertAdtoBs("#application_date_ad", "#application_date_bs");
        var darta_date_ad = new Date($("#darta_date_ad").val());
        var application_date_ad = new Date($("#application_date_ad").val());
        // alert(darta_date_ad); alert(application_date_ad);
        if (darta_date_ad.getTime() < application_date_ad.getTime()) {
            alert("निबेदन मिति दर्ता मिति भन्दा बढी भयो !!");
            $("#application_date_bs").focus();
            $("#application_date_bs").val("");
            $("#application_date_ad").val("");
        }
    });

    $("#service_date_bs").change(function() {
        convertBstoAd("#service_date_bs", "#service_date_ad");
    });
    $("#service_date_ad").change(function() {
        convertAdtoBs("#service_date_ad", "#service_date_bs");
    });
    $("#verified_date_bs").change(function() {
        convertBstoAd("#verified_date_bs", "#verified_date_ad");
    });
    $("#verified_date_ad").change(function() {
        convertAdtoBs("#verified_date_ad", "#verified_date_bs");
    });
    $("#rejected_date_bs").change(function() {
        convertBstoAd("#rejected_date_bs", "#rejected_date_ad");
    });
    $("#rejected_date_ad").change(function() {
        convertAdtoBs("#rejected_date_ad", "#rejected_date_bs");
    });
    $("#rokka_date_bs").change(function() {
        convertBstoAd("#rokka_date_bs", "#rokka_date_ad");
    });
    $("#rokka_date_ad").change(function() {
        convertAdtoBs("#rokka_date_ad", "#rokka_date_bs");
    });
    $("#service_receipt_date_bs").change(function() {
        convertBstoAd("#service_receipt_date_bs", "#service_receipt_date_ad");
    });
    $("#service_receipt_date_ad").change(function() {
        convertAdtoBs("#service_receipt_date_ad", "#service_receipt_date_bs");
    });

    $("#chalan_date_bs").change(function() {
        convertBstoAd("#chalan_date_bs", "#chalan_date_ad");
    });
    $("#chalan_date_ad").change(function() {
        convertAdtoBs("#chalan_date_ad", "#chalan_date_bs");
    });

    // TEmplate  temp_marriage_certificate
    $("#married_date_bs").change(function() {
        convertBstoAd("#married_date_bs", "#married_date_ad");
    });
    $("#married_date_ad").change(function() {
        convertAdtoBs("#married_date_ad", "#married_date_bs");
    });

    // temp_dob_certificate

    $("#edu_dob_bs").change(function() {
        convertBstoAd("#edu_dob_bs", "#edu_dob_ad");
    });
    $("#edu_dob_ad").change(function() {
        convertAdtoBs("#edu_dob_ad", "#edu_dob_bs");
    });
    //temp_business_closed
    $("#business_closed_date_bs").change(function() {
        convertBstoAd("#business_closed_date_bs", "#business_closed_date_ad");
    });
    $("#business_closed_date_ad").change(function() {
        convertAdtoBs("#business_closed_date_ad", "#business_closed_date_bs");
    });
    $("#visit_date_bs").change(function() {
        convertBstoAd("#visit_date_bs", "#visit_date_ad");
    });
    $("#visit_date_ad").change(function() {
        convertAdtoBs("#visit_date_ad", "#visit_date_bs");
    });
    $("#construction_date_bs").change(function() {
        convertBstoAd("#construction_date_bs", "#construction_date_ad");
    });
    $("#construction_date_ad").change(function() {
        convertAdtoBs("#construction_date_ad", "#construction_date_bs");
    });

    $("#temp_settlement_date_bs").change(function() {
        convertBstoAd("#temp_settlement_date_bs", "#temp_settlement_date_ad");
    });
    $("#temp_settlement_date_ad").change(function() {
        convertAdtoBs("#temp_settlement_date_ad", "#temp_settlement_date_bs");
    });

    $("#migration_date_bs").change(function() {
        convertBstoAd("#migration_date_bs", "#migration_date_ad");
    });
    $("#migration_date_ad").change(function() {
        convertAdtoBs("#migration_date_ad", "#migration_date_bs");
    });

    // permanent settlement
    $("#permanent_settlement_date_bs").change(function() {
        convertBstoAd(
            "#permanent_settlement_date_bs",
            "#permanent_settlement_date_ad"
        );
    });
    $("#permanent_settlement_date_ad").change(function() {
        convertAdtoBs(
            "#permanent_settlement_date_ad",
            "#permanent_settlement_date_bs"
        );
    });
    //temp_court_fee_deduction
    $("#lawsuit_date_bs").change(function() {
        convertBstoAd("#lawsuit_date_bs", "#lawsuit_date_ad");
    });
    $("#lawsuit_date_ad").change(function() {
        convertAdtoBs("#lawsuit_date_ad", "#lawsuit_date_bs");
    });
    //temp_mohi_lagat_katta
    $("#sarjamin_date_bs").change(function() {
        convertBstoAd("#sarjamin_date_bs", "#sarjamin_date_ad");
    });
    $("#sarjamin_date_ad").change(function() {
        convertAdtoBs("#sarjamin_date_ad", "#sarjamin_date_bs");
    });

    //renew_handicapped_certificate

    $("#dis_certificate_issued_date_bs").change(function() {
        convertBstoAd(
            "#dis_certificate_issued_date_bs",
            "#dis_certificate_issued_date_ad"
        );
    });
    $("#dis_certificate_issued_date_ad").change(function() {
        convertAdtoBs(
            "#dis_certificate_issued_date_ad",
            "#dis_certificate_issued_date_bs"
        );
    });
    //temp_entiled certified
    $("#relationship_issued_date_bs").change(function() {
        convertBstoAd(
            "#relationship_issued_date_bs",
            "#relationship_issued_date_ad"
        );
    });
    $("#relationship_issued_date_ad").change(function() {
        convertAdtoBs(
            "#relationship_issued_date_ad",
            "#relationship_issued_date_bs"
        );
    });
    //temp_dob_revision
    $("#actual_birth_date_bs").change(function() {
        convertBstoAd("#actual_birth_date_bs", "#actual_birth_date_ad");
    });
    $("#actual_birth_date_ad").change(function() {
        convertAdtoBs("#actual_birth_date_ad", "#actual_birth_date_bs");
    });
    $("#mistake_birth_date_bs").change(function() {
        convertBstoAd("#mistake_birth_date_bs", "#mistake_birth_date_ad");
    });
    $("#mistake_birth_date_ad").change(function() {
        convertAdtoBs("#mistake_birth_date_ad", "#mistake_birth_date_bs");
    });
    // temp business registration
    $("#reg_date_bs").change(function() {
        convertBstoAd("#reg_date_bs", "#reg_date_ad");
    });
    $("#reg_date_ad").change(function() {
        convertAdtoBs("#reg_date_ad", "#reg_date_bs");
    });
    $("#registered_date_bs").change(function() {
        convertBstoAd("#registered_date_bs", "#registered_date_ad");
    });
    $("#registered_date_ad").change(function() {
        convertAdtoBs("#registered_date_ad", "#registered_date_bs");
    });

    // temp ghar jagga namsari
    $("#death_date_bs").change(function() {
        convertBstoAd("#death_date_bs", "#death_date_ad");
    });
    $("#death_date_ad").change(function() {
        convertAdtoBs("#death_date_ad", "#death_date_bs");
    });

    $("#court_date_bs").change(function() {
        convertBstoAd("#court_date_bs", "#court_date_ad");
    });
    $("#court_date_ad").change(function() {
        convertAdtoBs("#court_date_ad", "#court_date_bs");
    });

    $("#date_to_bs").change(function() {
        convertBstoAd("#date_to_bs", "#date_to_ad");
    });
    $("#date_to_ad").change(function() {
        convertAdtoBs("#date_to_ad", "#date_to_bs");
    });

    $("#date_from_bs").change(function() {
        convertBstoAd("#date_from_bs", "#date_from_ad");
    });
    $("#date_from_ad").change(function() {
        convertAdtoBs("#date_from_ad", "#date_from_bs");
    });
    // temp_guardian_sifarish
    $("#child_dob_bs").change(function() {
        convertBstoAd("#child_dob_bs", "#child_dob_ad");
    });
    $("#child_dob_ad").change(function() {
        convertAdtoBs("#child_dob_ad", "#child_dob_bs");
    });
    // temp_consumer_committee_formed_sifarish
    $("#gathering_date_bs").change(function() {
        convertBstoAd("#gathering_date_bs", "#gathering_date_ad");
    });
    $("#gathering_date_ad").change(function() {
        convertAdtoBs("#gathering_date_ad", "#gathering_date_bs");
    });
    //temp_yojana_change_sifaris
    $("#meeting_date_bs").change(function() {
        convertBstoAd("#meeting_date_bs", "#meeting_date_ad");
    });
    $("#meeting_date_ad").change(function() {
        convertAdtoBs("#meeting_date_ad", "#meeting_date_bs");
    });

    //temp_sabalak_sifarish
    $('#sabalak_date_ad').change(function() {
        convertAdtoBs('#sabalak_date_ad', '#sabalak_date_bs');
    });
    $('#sabalak_date_bs').change(function() {
        convertBstoAd('#sabalak_date_bs', '#sabalak_date_ad');
    });
    $('#citizen_issued_date_ad').change(function() {
        convertAdtoBs('#citizen_issued_date_ad', '#citizen_issued_date_bs');
    });
    $('#citizen_issued_date_bs').change(function() {
        convertBstoAd('#citizen_issued_date_bs', '#citizen_issued_date_ad');
    });

    //temp_mainbatoma_jagga_nabhayeko
    $('#chalani_date_ad').change(function() {
        convertAdtoBs('#chalani_date_ad', '#chalani_date_bs');
    });
    $('#chalani_date_bs').change(function() {

        convertBstoAd('#chalani_date_bs', '#chalani_date_ad');
    });

    //temp_poverty_scholarship and temp_scholarship
    $("#children_dob_date_ad").change(function() {
        convertAdtoBs("#children_dob_date_ad", "#children_dob_date_bs");
    });
    $('#children_dob_date_bs').change(function() {

        convertBstoAd('#children_dob_date_bs', '#children_dob_date_ad');
    });
    //temp_attend_discussion

    $('#attending_date_ad').change(function() {
        convertAdtoBs('#attending_date_ad', '#attending_date_bs');
    });
    $('#attending_date_bs').change(function() {
        convertBstoAd('#attending_date_bs', '#attending_date_ad');
    });


    $('#hakdar_death_ad').change(function() {
        convertAdtoBs('#hakdar_death_ad', '#hakdar_death_bs');
    });
    $('#hakdar_death_bs').change(function() {
        convertBstoAd('#hakdar_death_bs', '#hakdar_death_ad');
    });

    $('#hakdar_citizenship_issued_date_ad').change(function() {
        convertAdtoBs('#hakdar_citizenship_issued_date_ad', '#hakdar_citizenship_issued_date_bs');
    });
    $('#hakdar_citizenship_issued_date_bs').change(function() {
        convertBstoAd('#hakdar_citizenship_issued_date_bs', '#hakdar_citizenship_issued_date_ad');
    });


    $('#business_start_date_ad').change(function() {
        convertAdtoBs('#business_start_date_ad', '#business_start_date_bs');
    });
    $('#business_start_date_bs').change(function() {
        convertBstoAd('#business_start_date_bs', '#business_start_date_ad');
    });

    $('#citizenship_issued_date_ad').change(function() {
        convertAdtoBs('#citizenship_issued_date_ad', '#citizenship_issued_date_bs');
    });
    $('#citizenship_issued_date_bs').change(function() {
        convertBstoAd('#citizenship_issued_date_bs', '#citizenship_issued_date_ad');
    });

    $("#closed_date_bs").change(function() {
        convertBstoAd("#closed_date_bs", "#closed_date_ad");
    });
    $("#closed_date_ad").change(function() {
        convertAdtoBs("#closed_date_ad", "#closed_date_bs");
    });

    $("#construction_approval_date_bs").change(function() {
        convertBstoAd("#construction_approval_date_bs", "#construction_approval_date_ad");
    });
    $("#construction_approval_date_ad").change(function() {
        convertAdtoBs("#construction_approval_date_ad", "#construction_approval_date_bs");
    });

    $("#daughter_in_law_death_date_bs").change(function() {
        convertBstoAd("#daughter_in_law_death_date_bs", "#daughter_in_law_death_date_ad");
    });
    $("#daughter_in_law_death_date_ad").change(function() {
        convertAdtoBs("#daughter_in_law_death_date_ad", "#daughter_in_law_death_date_bs");
    });

    $("#dob_date_bs").change(function() {
        convertBstoAd("#dob_date_bs", "#dob_date_ad");
    });
    $("#dob_date_ad").change(function() {
        convertAdtoBs("#dob_date_ad", "#dob_date_bs");
    });

    $("#mohi_death_date_bs").change(function() {
        convertBstoAd("#mohi_death_date_bs", "#mohi_death_date_ad");
    });
    $("#mohi_death_date_ad").change(function() {
        convertAdtoBs("#mohi_death_date_ad", "#mohi_death_date_bs");
    });

    $("#relation_date_bs").change(function() {
        convertBstoAd("#relation_date_bs", "#relation_date_ad");
    });
    $("#relation_date_ad").change(function() {
        convertAdtoBs("#relation_date_ad", "#relation_date_bs");
    });

    $("#settlement_date_bs").change(function() {
        convertBstoAd("#settlement_date_bs", "#settlement_date_ad");
    });
    $("#settlement_date_ad").change(function() {
        convertAdtoBs("#settlement_date_ad", "#settlement_date_bs");
    });

    $("#son_death_date_bs").change(function() {
        convertBstoAd("#son_death_date_bs", "#son_death_date_ad");
    });
    $("#son_death_date_ad").change(function() {
        convertAdtoBs("#son_death_date_ad", "#son_death_date_bs");
    });

    $("#birthdate_bs").change(function() {
        convertBstoAd("#birthdate_bs", "#birthdate_ad");
    });
    $("#birthdate_ad").change(function() {
        convertAdtoBs("#birthdate_ad", "#birthdate_bs");
    });

    $("#deathdate_bs").change(function() {
        convertBstoAd("#deathdate_bs", "#deathdate_ad");
    });
    $("#deathdate_ad").change(function() {
        convertAdtoBs("#deathdate_ad", "#deathdate_bs");
    });

    $("#daughter_in_law_death_date_bs").change(function() {
        convertBstoAd("#daughter_in_law_death_date_bs", "#daughter_in_law_death_date_ad");
    });
    $("#daughter_in_law_death_date_ad").change(function() {
        convertAdtoBs("#daughter_in_law_death_date_ad", "#daughter_in_law_death_date_bs");
    });

    $("#relative_dob_date_bs").change(function() {
        convertBstoAd("#relative_dob_date_bs", "#relative_dob_date_ad");
    });
    $("#relative_dob_date_ad").change(function() {
        convertAdtoBs("#relative_dob_date_ad", "#relative_dob_date_bs");
    });

    $("#shift_date_bs").change(function() {
        convertBstoAd("#shift_date_bs", "#shift_date_ad");
    });
    $("#shift_date_ad").change(function() {
        convertAdtoBs("#shift_date_ad", "#shift_date_bs");
    });

    $("#map_pass_date_bs").change(function() {
        convertBstoAd("#map_pass_date_bs", "#map_pass_date_ad");
    });
    $("#map_pass_date_ad").change(function() {
        convertAdtoBs("#map_pass_date_ad", "#map_pass_date_bs");
    });

    $("#dpc_approve_date_bs").change(function() {
        convertBstoAd("#dpc_approve_date_bs", "#dpc_approve_date_ad");
    });
    $("#dpc_approve_date_ad").change(function() {
        convertAdtoBs("#dpc_approve_date_ad", "#dpc_approve_date_bs");
    });
    $("#dpc_above_approve_date_bs").change(function() {
        convertBstoAd("#dpc_above_approve_date_bs", "#dpc_above_approve_date_ad");
    });
    $("#dpc_above_approve_date_ad").change(function() {
        convertAdtoBs("#dpc_above_approve_date_ad", "#dpc_above_approve_date_bs");
    });
    $("#migration_date_bs").change(function() {
        convertBstoAd("#migration_date_bs", "#migration_date_ad");
    });
    $("#migration_date_ad").change(function() {
        convertAdtoBs("#migration_date_ad", "#migration_date_bs");
    });
    $("#damage_date_bs").change(function() {
        convertBstoAd("#damage_date_bs", "#damage_date_ad");
    });
    $("#damage_date_ad").change(function() {
        convertAdtoBs("#damage_date_ad", "#damage_date_bs");
    });
    $("#citizenship_issued_bs").change(function() {
        convertBstoAd("#citizenship_issued_bs", "#citizenship_issued_ad");
    });
    $("#citizenship_issued_ad").change(function() {
        convertAdtoBs("#citizenship_issued_ad", "#citizenship_issued_bs");
    });
    $("#certificate_issued_date_bs").change(function() {
        convertBstoAd("#certificate_issued_date_bs", "#certificate_issued_date_ad");
    });
    $("#certificate_issued_date_ad").change(function() {
        convertAdtoBs("#certificate_issued_date_ad", "#certificate_issued_date_bs");
    });

    $("#covid_test_date_bs").change(function() {
        convertBstoAd("#covid_test_date_bs", "#covid_test_date_ad");
    });
    $("#covid_test_date_ad").change(function() {
        convertAdtoBs("#covid_test_date_ad", "#covid_test_date_bs");
    });
    $("#test_result_date_bs").change(function() {
        convertBstoAd("#test_result_date_bs", "#test_result_date_ad");
    });
    $("#test_result_date_ad").change(function() {
        convertAdtoBs("#test_result_date_ad", "#test_result_date_bs");
    });
    $("#verify_date_bs").change(function() {
        convertBstoAd("#verify_date_bs", "#verify_date_ad");
    });
    $("#verify_date_ad").change(function() {
        convertAdtoBs("#verify_date_ad", "#verify_date_bs");
    });
    $("#going_date_bs").change(function() {
        convertBstoAd("#going_date_bs", "#going_date_ad");
    });
    $("#going_date_ad").change(function() {
        convertAdtoBs("#going_date_ad", "#going_date_bs");
    });

    $("#rel_citizenship_issued_date_bs").change(function() {
        convertBstoAd("#rel_citizenship_issued_date_bs", "#rel_citizenship_issued_date_ad");
    });
    $("#rel_citizenship_issued_date_ad").change(function() {
        convertAdtoBs("#rel_citizenship_issued_date_ad", "#rel_citizenship_issued_date_bs");
    });

    $("#exchange_rate_updated_date_bs").change(function() {
        convertBstoAd("#exchange_rate_updated_date_bs", "#exchange_rate_updated_date_ad");
    });
    $("#exchange_rate_updated_date_ad").change(function() {
        convertAdtoBs("#exchange_rate_updated_date_ad", "#exchange_rate_updated_date_bs");
    });

    $("#rel_dob_bs").change(function() {
        convertBstoAd("#rel_dob_bs", "#rel_dob_ad");
    });
    $("#rel_dob_ad").change(function() {
        convertAdtoBs("#rel_dob_ad", "#rel_dob_bs");
    });
    $("#sanakhat_citizenship_issued_date_bs").change(function() {
        convertBstoAd("#sanakhat_citizenship_issued_date_bs", "#sanakhat_citizenship_issued_date_ad");
    });
    $("#sanakhat_citizenship_issued_date_ad").change(function() {
        convertAdtoBs("#sanakhat_citizenship_issued_date_ad", "#sanakhat_citizenship_issued_date_bs");
    });

    $("#merge1_date_bs").change(function() {
        convertBstoAd("#merge1_date_bs", "#merge1_date_ad");
    });
    $("#merge1_date_ad").change(function() {
        convertAdtoBs("#merge1_date_ad", "#merge1_date_bs");
    });
    $("#merge2_date_bs").change(function() {
        convertBstoAd("#merge2_date_bs", "#merge2_date_ad");
    });
    $("#merge2_date_ad").change(function() {
        convertAdtoBs("#merge2_date_ad", "#merge2_date_bs");
    });
    $("#propsed_ctznship_date_bs").change(function() {
        convertBstoAd("#propsed_ctznship_date_bs", "#proposed_ctznship_date_ad");
    });
    $("#proposed_ctznship_date_ad").change(function() {
        convertAdtoBs("#proposed_ctznship_date_ad", "#propsed_ctznship_date_bs");
    });
    $("#municipal_date_bs").change(function() {
        convertBstoAd("#municipal_date_bs", "#municipal_date_ad");
    });
    $("#municipal_date_ad").change(function() {
        convertAdtoBs("#municipal_date_ad", "#municipal_date_bs");
    });
    $("#fatherInLaw_citizenship_issued_date_bs").change(function() {
        convertBstoAd("#fatherInLaw_citizenship_issued_date_bs", "#fatherInLaw_citizenship_issued_date_ad");
    });
    $("#fatherInLaw_citizenship_issued_date_ad").change(function() {
        convertAdtoBs("#fatherInLaw_citizenship_issued_date_ad", "#fatherInLaw_citizenship_issued_date_bs");
    });
    $("#husband_citizenship_issued_date_bs").change(function() {
        convertBstoAd("#husband_citizenship_issued_date_bs", "#husband_citizenship_issued_date_ad");
    });
    $("#husband_citizenship_issued_date_ad").change(function() {
        convertAdtoBs("#husband_citizenship_issued_date_ad", "#husband_citizenship_issued_date_bs");
    });
    $("#agreement_date_bs").change(function() {
        convertBstoAd("#agreement_date_bs", "#agreement_date_ad");
    });
    $("#agreement_date_ad").change(function() {
        convertAdtoBs("#agreement_date_ad", "#agreement_date_bs");
    });
    $("#approval_date_bs").change(function() {
        convertBstoAd("#approval_date_bs", "#approval_date_ad");
    });
    $("#approval_date_ad").change(function() {
        convertAdtoBs("#approval_date_ad", "#approval_date_bs");
    });
    $("#completed_date_bs").change(function() {
        convertBstoAd("#completed_date_bs", "#completed_date_ad");
    });
    $("#completed_date_ad").change(function() {
        convertAdtoBs("#completed_date_ad", "#completed_date_bs");
    });
    $("#relation_proof_date_bs").change(function() {
        convertBstoAd("#relation_proof_date_bs", "#relation_proof_date_ad");
    });
    $("#relation_proof_date_ad").change(function() {
        convertAdtoBs("#relation_proof_date_ad", "#relation_proof_date_bs");
    });
    $("#rental_tax_paid_date_bs").change(function() {
        convertBstoAd("#rental_tax_paid_date_bs", "#rental_tax_paid_date_ad");
    });
    $("#rental_tax_paid_date_ad").change(function() {
        convertAdtoBs("#rental_tax_paid_date_ad", "#rental_tax_paid_date_bs");
    });

    $("#decision_date_bs").change(function() {
        convertBstoAd("#decision_date_bs", "#decision_date_ad");
    });
    $("#decision_date_ad").change(function() {
        convertAdtoBs("#decision_date_ad", "#decision_date_bs");
    });
    $("#rent_not_paid_date_bs").change(function() {
        convertBstoAd("#rent_not_paid_date_bs", "#rent_not_paid_date_ad");
    });
    $("#rent_not_paid_date_ad").change(function() {
        convertAdtoBs("#rent_not_paid_date_ad", "#rent_not_paid_date_bs");
    });

    $("#birthreg_register_date_bs").change(function() {
        convertBstoAd("#birthreg_register_date_bs", "#birthreg_register_date_ad");
    });
    $("#birthreg_register_date_ad").change(function() {
        convertAdtoBs("#birthreg_register_date_ad", "#birthreg_register_date_bs");
    });

    $("#death_bs").change(function() {
        convertBstoAd("#death_bs", "#death_ad");
    });
    $("#death_ad").change(function() {
        convertAdtoBs("#death_ad", "#death_bs");
    });
     $("#disease_occur_date_bs").change(function() {
        convertBstoAd("#disease_occur_date_bs", "#disease_occur_date_ad");
    });
    $("#disease_occur_date_ad").change(function() {
        convertAdtoBs("#disease_occur_date_ad", "#disease_occur_date_bs");
    });

    $("#business_not_operating_date_bs").change(function() {
        convertBstoAd("#business_not_operating_date_bs", "#business_not_operating_date_ad");
    });
    $("#business_not_operating_date_ad").change(function() {
        convertAdtoBs("#business_not_operating_date_ad", "#business_not_operating_date_bs");
    });


    $("#foreign_citizenship_give_up_bs").change(function() {
        convertBstoAd("#foreign_citizenship_give_up_bs", "#foreign_citizenship_give_up_ad");
    });
    $("#foreign_citizenship_give_up_ad").change(function() {
        convertAdtoBs("#foreign_citizenship_give_up_ad", "#foreign_citizenship_give_up_bs");
    });
