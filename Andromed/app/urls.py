from django.urls import path

from . import views

urlpatterns = [
    path('<str:asset_type>/<str:threat_type>', views.home, name='home'),
    path('search/', views.search, name='search'),
    path('about/', views.about, name='about'),
]