Program QuadraticEquation;
  Var a, b, c : Real; 
  Discr : Real;
  x1, x2   : Real;
  Test, NTest : Integer;  
BEGIN
  ReadLn(NTest);
  For Test := 1 to NTest do 
begin
  ReadLn(a, b, c);
  If (a=0) and (b=0) and (c=0)
then begin 
  Write(x=0)
  end
else
  If (a=0) and (b<>0)
then WriteLn((-c/b):6:2)
else
  If (a=0) and (b=0) and (c<>0)
  else
begin
  Discr := b*b - 4*a*c;
  If Discr > 0 
then begin
  x1:=(-b + Sqrt(Discr)) / (2*a);
  x2:=(-b - Sqrt(Discr)) / (2*a);
  Write( x1:6:2,x2:6:2)
  end
else
  If Discr = 0
then begin
  x1 := -b/(2*a); 
  WriteLn(x1:6:2,x1:6:2)
END.