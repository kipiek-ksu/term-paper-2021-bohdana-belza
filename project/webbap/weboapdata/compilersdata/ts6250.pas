program t6z16;
var m:integer;

procedure read(i,j,m:integer);
var mass:array [1..100,1..100] of real;
begin
    for i:=1 to m do
    begin
        for j:=1 to m do
        begin
            writeln('A[',i,',',j,']= ');
            read(mass[i,j]);
            make;
        end;
    end;
end;

procedure make(i,j,m:integr;mas:array[1..100,1..100] of real;)
begin
    if j<=i then
     mass[i,j]:=0;
end;

procedure vivod(mass:array[1..100,1..100] of real);
begin
    for i:=1 to m do
    begin
        for j:=1 to m do
          write(mass[i,j],' ');
        writeln;
    end;
end;

begin
clrscr;
    repeat
         writeln('Vvedite zna4enie M matrici poryadka MxM');
         readln(m);
    until m>0;

    read;
end.