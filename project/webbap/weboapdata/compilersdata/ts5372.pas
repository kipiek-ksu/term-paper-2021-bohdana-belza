program zadacha16;
var A,B:integer;
    R1,R2:integer;
begin
    read A,B;
    R1:=A/B mod 10;
    R2:=A/B div 10;
    writeln('vedi A');
    writeln('vedi B');
    write(R1,R2);
end.