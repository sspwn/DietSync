import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { RegistrarDietaPage } from './registrar-dieta.page';

const routes: Routes = [
  {
    path: '',
    component: RegistrarDietaPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RegistrarDietaPageRoutingModule {}
