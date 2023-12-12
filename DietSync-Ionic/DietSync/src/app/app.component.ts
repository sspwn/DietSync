import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  public appPages = [
    { title: 'Registrar Dieta', url: '/registrar-dieta', icon: 'pizza' },
    { title: 'Registrar Treino', url: '/registrar-treino', icon: 'barbell' },
    { title: 'Receitas', url: '/receitas', icon: 'restaurant' },
    { title: 'Evolução', url: '/evolucao', icon: 'trending-up' },
    { title: 'Dicas', url: '/dicas', icon: 'information' },
    { title: 'Configurações', url: '/config', icon: 'settings' },
  ];
  public labels = ['Family', 'Friends', 'Notes', 'Work', 'Travel', 'Reminders'];
  constructor() {}
}
