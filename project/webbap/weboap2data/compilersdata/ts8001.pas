Program D_3_23;
var y: real;
function t(x: real): real; forward;
function pow(y: real; x: integer): real;
var i: integer;
    c: real;
begin
 c:=1;
 for i := 1 to x do
 c:=c*y;
 pow:=c;
end;
function res(y: real): real;
begin
 res:=(1.7*t(0.25)+2*t(1+y))/(6-t(y*y-1));
end;
function t(x: real): real;
var k: integer;
    i,i2: real;
begin
 i:=0;
 i2:=0;
 for k:=0 to 10 do
 i:=i+(pow(x,2*k+1))/(2*k+1);
 for k:=0 to 10 do
 i2:=i2+(pow(x,2*k))/(2*k+1);
 t:=i/i2;
end;
begin
 read(y);
 write(res(y):0:3);
end.

