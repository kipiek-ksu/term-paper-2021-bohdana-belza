program t6z8_2;
var   a:array [1..100,1..100] of real;
    Rez:array [1..100] of real;
    m,n:integer;
    i,j:integer;
begin
clrscr;
    repeat
         writeln('Vvedite zna4enie N dlya matrici formatom Nx9');
         readln(n);
    until (n>0);

    m:=n;

    for i:=1 to 9 do
    begin
        rez[j]:=0;
        a[i,j]:=0;
        for j:=1 to n do
        begin
            write('A[',i,',',j,']= ');
            readln(a[i,j]);

            rez[j]:=rez[j]+a[i,j];
        end;
        rez[i]:=rez[j]/m;
    end;


    for i:=1 to 9 do
    begin
        writeln(rez[i]:0:1);
        writeln;
    end;
    readkey;
end.