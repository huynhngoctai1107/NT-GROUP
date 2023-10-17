// Script.js

const host = "https://provinces.open-api.vn/api/";

var callAPI = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data, "city");
            // Tự động chọn giá trị trong select city
            var selectedCity = $("#valueCity").val() || "";
            $("#city").val(selectedCity);
            $("#city").change();
        });
}

var callApiDistrict = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.districts, "district");
            // Tự động chọn giá trị trong select district
            var selectedDistrict = $("#valueDistrict").val() || "";
            $("#district").val(selectedDistrict);
            $("#district").change();
        });
}

var callApiWard = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.wards, "ward");
            // Tự động chọn giá trị trong select ward
            var selectedWard = $("#valueWard").val() || "";
            $("#ward").val(selectedWard);
            printResult();
        });
}

var renderData = (array, select) => {
    let row = ' <option disable value="">Chọn</option>';
    array.forEach(element => {
        row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
    });
    document.querySelector("#" + select).innerHTML = row;
}

$("#city").change(() => {
    callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
});

$("#district").change(() => {
    callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
});

$("#ward").change(() => {
    printResult();
});

var printResult = () => {
    var city = $("#city").val() || "";
    var district = $("#district").val() || "";
    var ward = $("#ward").val() || "";

    var result = `${city} - ${district} - ${ward} - `;
    document.querySelector("#result").innerHTML = result;
    $("#result").val(result); // Đặt giá trị vào input hidden
}

// Gọi API tỉnh/thành phố để lấy danh sách
callAPI(host + "p?depth=1");