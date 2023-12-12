import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RegistrarDietaPageRoutingModule } from './registrar-dieta-routing.module';

import { RegistrarDietaPage } from './registrar-dieta.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RegistrarDietaPageRoutingModule
  ],
  declarations: [RegistrarDietaPage]
})
export class RegistrarDietaPageModule {}
