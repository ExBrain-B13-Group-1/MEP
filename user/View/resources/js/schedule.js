function todyView (element) {
    const secondBtn = $(element).parent().children()[1]
    $(secondBtn).attr('aria-active',false)
    $(element).attr('aria-active',true)

    $('#weekSchedule').fadeOut(() =>{
        $('#todayTime').fadeIn(100)
        $('#todaySchedule').fadeIn(100)
    })

}

function weekView (element) {
    const fistBtn = $(element).parent().children()[0]
    $(fistBtn).attr('aria-active',false)
    $(element).attr('aria-active',true)
    $('#todayTime').fadeOut()
    $('#todaySchedule').fadeOut()
    $('#weekSchedule').fadeIn(100)
}