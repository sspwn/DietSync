import { ComponentFixture, TestBed } from '@angular/core/testing';
import { RegistrarDietaPage } from './registrar-dieta.page';

describe('RegistrarDietaPage', () => {
  let component: RegistrarDietaPage;
  let fixture: ComponentFixture<RegistrarDietaPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(RegistrarDietaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
