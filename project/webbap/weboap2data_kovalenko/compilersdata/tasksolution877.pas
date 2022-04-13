function Opred(a,b,c,d:real):real;
    begin
        Opred:= a*d-b*c;
    end;

var
    a,b,c,d:real;
begin
    Read(a,b,c,d);
    Write(Opred(a,b,c,d):0:3);
end.