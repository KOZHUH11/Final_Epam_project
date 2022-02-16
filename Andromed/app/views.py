from django.shortcuts import render
from django.db import connection


def get_db_enum(asset_type_name):
    d = {
        "server": '1',
        "personal_data": '2',
        "contract": '3'
    }
    return d[asset_type_name]


def get_db(threat_request_name):
    d = {
        "accessibility": "accessibility",
        "integrity": "integrity",
        "confidentiality": "confidentiality",
    }
    return d[threat_request_name]


def get_query_string(asset, threat):
    return "SELECT * FROM {}".format(get_db(threat)+get_db_enum(asset))


def get_query_string_for_search(searched):
    return "SELECT * FROM all_for_search WHERE Загроза LIKE '%{}%'".format(searched)


def home(request, asset_type, threat_type):
    cursor = connection.cursor()
    query_string = get_query_string(asset_type, threat_type)
    cursor.execute(query_string)
    rows = cursor.fetchall()
    context = {'results': rows}
    return render(request, 'app/home.html', context=context)


def search(request):
    cursor = connection.cursor()
    if request.method == 'POST':
        query_string = get_query_string_for_search(request.POST['keyword'])
    else:
        query_string = "SELECT * FROM all_for_search"
    cursor.execute(query_string)
    rows = cursor.fetchall()
    context = {'results': rows}
    return render(request, 'app/search.html', context=context)


def about(request):
    return render(request, 'app/about.html')


# TODO
# replace getattrs
# add header with links
# add company info
# make installable
