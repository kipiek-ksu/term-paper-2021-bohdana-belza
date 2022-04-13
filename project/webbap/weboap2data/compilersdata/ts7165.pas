Program lab_1_12;
var R1,R2,abcd,a,b,c,d:integer;
begin
read(abcd);
a:=abcd div 1000;
b:=(abcd div 100) mod 10;
c:=(abcd mod 100) div 10;
d:=(abcd mod 10);
R1:=a+d;
R2:=b+c;
write (R1,' ',R2);
END.