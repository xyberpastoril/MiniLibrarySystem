document.addEventListener('DOMContentLoaded', async()=>{
    let key = document.getElementById('_table_transactions').getAttribute('key')
    let data = await fetch_transactions(key) // tbd

    let _table_body = document.getElementById('_table_body')

    if (data){
        _table_body.innerHTML = _generate_rows(data.data)
    }
})
fetch_transactions = async(status) =>{
    try{
        let raws = await fetch(`/result/transactions/search/?status=${status}`)
        let data = await raws.json()
        return data
    }catch(e){
        console.log('Woof! Something is wrong!!~')
        return null
    }
}
_generate_rows = (data) =>{
    let inner = ''
    for (d of data){
        inner+=`
        <!--begin::Table row | Book -->
                <tr>
                    <!-- Checkbox -->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>

                    <!-- Transaction Number -->
                    <td class>TBD</td>

                    <!-- Book ID / ISBN -->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">${d.isbn}</a>
                    </td>

                    <!-- Request Date -->
                    <td>${(new Date(d.created_at)).toLocaleString([], {year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'})}</td>

                    <!-- From -->
                    <td></td>

                    <!-- To -->
                    <td></td>

                    <!-- Copies -->
                    <td>TBD</td>
                    
                    <!-- Actions -->
                    <td class="text-end">
                        <a href="#" id="returnedButton" class="btn btn-light btn-danger btn-sm" >Cancel
                        </a>
                    </td>
                </tr>`
    }
    return inner
}




/*
TO BE DISCUSSED (11/24/21):
1. Usage of row id from both tables
2. Searching transaction
3. Paginations

*/