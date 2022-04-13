program l1;
var A, R1, R2, R3, R4, B:integer;
begin
     read (A);
     R1 := A mod 100 div 10;
     R2 := A div 100 mod 10;
     R3 := A div 1000;
     R4 := A mod 10;
     B := R1 * 100 + R2 + R3/100 + R4